<?php

namespace Gdr\GameBundle\Controller;

use Doctrine\ORM\EntityNotFoundException;
use Gdr\ItemsBundle\Entity\Inventory;
use Gdr\ItemsBundle\Entity\Item;
use Gdr\UserBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Gdr\GameBundle\Entity\Letter;
use Gdr\GameBundle\Form\Type\LetterType;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

/**
 * Letter controller.
 *
 */
class LetterController extends Controller
{
    const LIMIT_PER_PAGE = 15;
    const LIMIT_RECEIVED = 30;

    /**
     * Lists all Letter entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $personage = $this->getPersonage();


        $this->deleteOldLetters();

        $letters = $em->getRepository('GdrGameBundle:Letter')
            ->getActivesByOwner($this->getPersonage()->getId());


        $count = count($letters->getResult());
        $letters = $letters->setHint('knp_paginator.count', $count);

        $paginator = $this->get('knp_paginator')
            ->paginate(
                $letters,
                $this->getRequest()->query->get('page', 1),
                self::LIMIT_PER_PAGE,
                array('distinct' => false)
            );


        if ($request->isXmlHttpRequest() === true) {
            return $this->render(
                'GdrGameBundle:Letter:list.html.twig',
                array(
                    'paginator' => $paginator,
                    'categories' => Letter::getCategories(),
                    'page' => $request->get('page')
                )
            );
        }

        $showMl = false;
        // Mostro il pulsante per inviare ML?
        if (false !== $personage->hasEnclave()) {
            $showMl = true;
        }
        if (!$showMl && false !== $personage->hasClan()) {
            $showMl = true;
        }
        if (!$showMl && $this->getPermission()->isMod()) {
            $showMl = true;
        }
        if (!$showMl && $this->getPermission()->isFate()) {
            $showMl = true;
        }
        if (!$showMl && $this->getPermission()->isAdmin()) {
            $showMl = true;
        }

        return $this->render(
            'GdrGameBundle:Letter:index.html.twig',
            array(
                'paginator' => $paginator,
                'categories' => Letter::getCategories(),
                'canWriteML' => $showMl,
                'page' => $request->get('page')
            )
        );
    }

    /**
     * @param bool $isForGroup
     * @param bool $destinatario
     * @param bool $threadId
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function createAction($isForGroup = false, $destinatario = false, $threadId = false)
    {
        $personage = $this->getPersonage();
        $entity = new Letter();

        if ($destinatario) {
            $destinatario = $this->getDoctrine()->getRepository('GdrUserBundle:Personage')
                ->findOneBy(array('name' => $destinatario));

            if (!$destinatario) {
                throw $this->createNotFoundException("Personaggio Inesistente.");
            }

            if (false == $isForGroup) {
                $entity->setReceiverName($destinatario->getName());
            }
        }

        $thread = null;
        // Sto segnalando un thread.
        if (false !== $threadId) {
            $thread = $this->getDoctrine()->getRepository('GdrGameBundle:ForumThread')
                ->getFirstPostOfThread($threadId);

            if (null === $thread) {
                throw $this->createNotFoundException("Thread Inesistente.");
            }
        }

        $form = $this->createForm(
            new LetterType($this->getPermission(), Letter::ACTION_NEW, $isForGroup, $personage),
            $entity
        );

        $request = $this->getRequest();
        $formValid = true;
        $form->handleRequest($request);

        if ($request->isMethod('POST')) {

            $bg = $form->get('background')->getData();

            if ($form->isValid()) {

                // Ho acquistato uno sfondo.
                if (null !== $bg) {
                    $personage->setBankAmount($personage->getBankAmount() - $bg->getPrice());
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($personage);
                    $em->flush();
                }

                if ($isForGroup) {
                    $this->get('gdr.game_bundle.general')->createLetter(
                        $entity,
                        $form->get('receiverGroup')->getData(),
                        $thread
                    );
                } else {
                    $this->get('gdr.game_bundle.general')->createLetter($entity, null, $thread);
                }

                if ($threadId) {
                    return $this->redirect($this->generateUrl('bacheca-show-thread', array('id' => $threadId)));
                }

                return $this->redirect($this->generateUrl('missive-index'));
            }
        }

        return $this->render(
            'GdrGameBundle:Letter:create.html.twig',
            array(
                'entity' => $entity,
                'form' => $form->createView(),
                'formValid' => $formValid,
                'isForGroup' => $isForGroup,
                'isForThread' => $threadId,
                'thread' => $thread
            )
        );
    }

    public function replyAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $request = $this->getRequest();
        $letter = $em->getRepository('GdrGameBundle:Letter')->find($id);

        if (!$letter) {
            throw $this->createNotFoundException('La missiva cercata non esiste.');
        }

        // Posso visualizzarla?
        $this->checkIfOwner($letter);

        $replyLetter = new Letter();
        $replyLetter->setReceiver($letter->getSender());
        $replyLetter->setReceiverName($letter->getSenderName());

        if ($letter->getNameAsAdmin()) {
            $fixName = "GESTIONE";
        } elseif ($letter->getNameAsMod()) {
            $fixName = "MODERAZIONE";
        } elseif ($letter->getNameAsFate()) {
            $fixName = "FATO";
        } else {
            $fixName = $letter->getSenderName();
        }

        $replyLetter->setOldBody(
            "<p class='reply-divider'>Il " . $letter->getCreatedAt()->format(
                'd/m/Y H:i'
            ) . ", <strong>{$fixName}</strong> ha scritto:</p>" .
            $letter->getBody() . $letter->getOldBody()
        );
        $replyLetter->setCategory($letter->getCategory());

        $form = $this->createForm(
            new LetterType($this->getPermission(), Letter::ACTION_REPLY),
            $replyLetter
        );

        $form->handleRequest($request);

        if ($form->isValid()) {

            $this->get('gdr.game_bundle.general')->createLetter($replyLetter);

            if ($form->get('deleteOnReply')->getData()) {
                $letter->setIsDeleted(true);
                $em->persist($letter);
                $em->flush();
            }

            return $this->redirect($this->generateUrl('missive-index'));
        }

        return $this->render(
            'GdrGameBundle:Letter:reply.html.twig',
            array(
                'form' => $form->createView(),
                'oldLetter' => $this->renderView(
                    'GdrGameBundle:Letter:show.html.twig',
                    array(
                        'letter' => $letter,
                    )
                )
            )
        );
    }

    public function inoltraAction($id, $isForGroup = false)
    {
        $em = $this->getDoctrine()->getManager();
        $request = $this->getRequest();
        $letter = $em->getRepository('GdrGameBundle:Letter')->find($id);

        if (!$letter) {
            throw $this->createNotFoundException('La missiva cercata non esiste.');
        }

        // Posso visualizzarla?
        $this->checkIfOwner($letter);

        if ($letter->getNameAsAdmin()) {
            $fixName = "GESTIONE";
        } elseif ($letter->getNameAsMod()) {
            $fixName = "MODERAZIONE";
        } elseif ($letter->getNameAsFate()) {
            $fixName = "FATO";
        } else {
            $fixName = $letter->getSenderName();
        }

        $inoltraLetter = clone $letter;
        $inoltraLetter->setReceiverName(null);
        $inoltraLetter->setReceiver(null);
        $inoltraLetter->setOldBody(
            "<p class='reply-divider'>Il " . $letter->getCreatedAt()->format(
                'd/m/Y H:i'
            ) . ", <strong>{$fixName}</strong> ha scritto:</p>" .
            $letter->getBody() . $letter->getOldBody()
        );
        $inoltraLetter->setBody(null);
        $inoltraLetter->setIsForward(true);
        $inoltraLetter->setCreatedAt(new \DateTime());
        $inoltraLetter->setIsRead(false);
        $inoltraLetter->setSpecial('[Missiva Inoltrata]');

        $form = $this->createForm(
            new LetterType($this->getPermission(), Letter::ACTION_INOLTRA, $isForGroup, $this->getPersonage()),
            $inoltraLetter
        );

        $form->handleRequest($request);

        if ($form->isValid()) {

            if ($isForGroup) {
                $this->get('gdr.game_bundle.general')->createLetter(
                    $inoltraLetter,
                    $form->get('receiverGroup')->getData()
                );
            } else {
                $this->get('gdr.game_bundle.general')->createLetter($inoltraLetter);
            }

            return $this->redirect($this->generateUrl('missive-index'));
        }

        return $this->render(
            'GdrGameBundle:Letter:forward.html.twig',
            array(
                'form' => $form->createView(),
                'id' => $letter->getId(),
                'isForGroup' => $isForGroup,
                'oldLetter' => $this->renderView(
                    'GdrGameBundle:Letter:show.html.twig',
                    array(
                        'letter' => $letter,
                        'letterCategories' => Letter::getCategories(),
                        'showButtons' => false,
                        'showInoltra' => false,
                    )
                )
            )
        );
    }

    /**
     * Finds and displays a Letter entity.
     *
     * Route("/{id}", name="missive_show")
     * Method("GET")
     * Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $letter = $em->getRepository('GdrGameBundle:Letter')->find($id);

        if (!$letter) {
            throw $this->createNotFoundException('La missiva cercata non esiste.');
        }

        // Posso visualizzarla?
        $this->checkIfOwner($letter);

        // Se non è stata letta, la imposto su letta.
        if (!$letter->getIsRead()) {
            $letter->setIsRead(true);

            $em->persist($letter);
            $em->flush();
        }

        return $this->render(
            'GdrGameBundle:Letter:show.html.twig',
            array(
                'letter' => $letter,
                'showButtons' => $letter->getSender() ? true : false,
                'showInoltra' => true,
                'letterCategories' => Letter::getCategories()
            )
        );
    }

    /**
     * Deletes a Letter entity.
     *
     */
    public function deleteAction(Request $request)
    {
        $ids = $request->request->get('missiva');

        if (count($ids) > LetterController::LIMIT_PER_PAGE) {
            throw new AccessDeniedHttpException();
        }

        $this->getDoctrine()->getRepository('GdrGameBundle:Letter')
            ->fakeDeleteLetters($ids, $this->getPersonage()->getId());

        return $this->redirect($this->generateUrl('missive-index', ['page' => $request->get('page')]));
    }

    public function deleteSingleAction($id, Request $request)
    {
        $letter = $this->getDoctrine()->getRepository('GdrGameBundle:Letter')
            ->find($id);

        if (null === $letter || $letter->getReceiver() !== $this->getPersonage()) {
            throw new EntityNotFoundException("Missiva da cancellare non trovata");
        }

        $letter->setIsDeleted(true);
        $em = $this->getDoctrine()->getManager();
        $em->persist($letter);
        $em->flush();

        return $this->redirect($this->generateUrl('missive-index', ['page' => $request->get('page')]));
    }

    public function showLetterAjaxAction()
    {
        $em = $this->getDoctrine()->getManager();

        $letters = $em->getRepository('GdrGameBundle:Letter')
            ->getNotReadedByOwner($this->getPersonage()->getId());

        return $this->render(
            'GdrGameBundle:Letter:ajax.html.twig',
            array(
                'letters' => $letters
            )
        );
    }

    public function convertToItemAction($id)
    {
        $letter = $this->getDoctrine()->getRepository("GdrGameBundle:Letter")
            ->find($id);

        $this->checkIfOwner($letter);

        $existItem = $this->getDoctrine()->getRepository('GdrItemsBundle:Item')
            ->findOneBy(array('letter' => $letter));

        $em = $this->getDoctrine()->getManager();

        if ($existItem) {

            // L'oggetto è in qualche inventario? Se non lo è, posso cancellarlo.
            $inInventory = $this->getDoctrine()->getRepository('GdrItemsBundle:Inventory')
                ->findOneBy(array("item" => $existItem));

            if (!$inInventory){
                $em->remove($existItem);
                $em->flush();
            }else{
                return new JsonResponse(array(
                    'response' => false,
                    'msg' => "Non puoi creare più di uno stesso oggetto-missiva."
                ));
            }
        }

        $name = $letter->getSenderName();
        $data = $letter->getCreatedAt();
        $type = $this->getDoctrine()->getRepository('GdrItemsBundle:ItemType')
            ->find(33);

        $item = new Item();
        $item->setType($type);
        $item->setName("Una Missiva di {$name} del " . $data->format('d/m/Y'));
        $item->setShortDescription("Missiva ricevuta da {$name} in data " . $data->format('d/m/Y'));
        $item->setLongDescription($letter->getBody());
        $item->setIsTransferable(true);
        $item->setIsTransportable(true);
        $item->setIsDestructible(true);
        $item->setImageName("5266e5abb5be6.jpeg");
        $item->setWeight(0);
        $item->setLetter($letter);
        $item->setExpendableDescription("distrugge la missiva definitivamente.");
        $item->setShowExpendableDescription(true);

        $inventory = new Inventory();
        $inventory->setPersonage($this->getPersonage());
        $inventory->setItem($item);
        $inventory->setIsEquipped(false);
        $inventory->setIsInvisible(true);

        $em->persist($item);
        $em->persist($inventory);
        $em->flush();

        return new JsonResponse(array(
            'response' => true,
            'msg' => "L'oggetto è stato creato ed ora si trova nel tuo inventario, sotto la voce \"Missive\"."
        ));
    }

    private function deleteOldLetters()
    {
        $personage = $this->getPersonage();

        $missive_totale = $this->getDoctrine()->getRepository('GdrGameBundle:Letter')
            ->getActiveCountLetters($personage->getId());

        if ($missive_totale > self::LIMIT_RECEIVED) {

            $toRemove = $missive_totale - self::LIMIT_RECEIVED;

            $this->getDoctrine()->getRepository('GdrGameBundle:Letter')
                ->deleteOldest($toRemove, $personage->getId());
        }
    }

    /**
     * @param Letter $letter
     *
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    private function checkIfOwner(Letter $letter)
    {
        if (!$letter->getReceiver() == $this->getPersonage()) {
            throw $this->createNotFoundException('La missiva non esiste.');
        }
    }
}
