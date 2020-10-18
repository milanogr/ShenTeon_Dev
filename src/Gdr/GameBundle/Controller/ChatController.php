<?php

namespace Gdr\GameBundle\Controller;

use Doctrine\ORM\EntityNotFoundException;
use Gdr\GameBundle\Controller\Location\BankController;
use Gdr\GameBundle\Entity\Chat;
use Gdr\GameBundle\Entity\ForumPost;
use Gdr\GameBundle\Entity\ForumThread;
use Gdr\GameBundle\Entity\Location;
use Gdr\GameBundle\Entity\Transaction;
use Gdr\GameBundle\Entity\TransactionType;
use Gdr\GameBundle\Form\Type\ChatType;
use Gdr\ItemsBundle\Entity\Inventory;
use Gdr\ItemsBundle\Entity\ItemType;
use Gdr\UserBundle\Controller\Controller;
use Gdr\UserBundle\Entity\Personage;
use Gdr\UserBundle\Entity\Skill;
use Gdr\UserBundle\Service\PersonageService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Type;

/**
 * Class ChatController
 *
 * @package Gdr\GameBundle\Controller
 */
class ChatController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        if (false === $this->canViewChat() && !$this->getPersonage()->getIsDead()) {
            $teon = $this->getDoctrine()->getRepository('GdrGameBundle:Location')
                ->findOneBy(
                    array("name" => "Mappa di Teon")
                );

            return $this->redirect($this->generateUrl('change_location', array('id' => $teon->getId())));
        }

        // Se sono appena entrato in gioco, non devo recuperare da questo momento...
        // ...invece se ero già entrato ($getFronInGame: true) recupero da quel momento (ho aggiornato la pagina)
        $enteredTime = $this->getPersonage()->getOnline()->getInGameEntered();
        $startTime = $enteredTime ? $enteredTime->modify('-50 minutes') : new \DateTime('-50 minutes');

        $chats = $this->getDoctrine()
            ->getRepository('GdrGameBundle:Chat')
            ->getLatest($this->getCurrentLocation(), $startTime);

        // Imposto chat-last-id per permettere ad ajax (il pooling automatico) di partire da questo id.
        $request->getSession()->set('chat-last-id', null);

        // Recupero l'ultimo elemento solo se $chats non è vuoto.
        $lastItem = $chats ? end($chats) : false;

        if (false !== $lastItem) {
            // Le prossime azioni di getAjaxChats inizieranno dopo questo id.
            $request->getSession()->set('chat-last-id', $lastItem->getId());
        }

        return $this->render(
            'GdrGameBundle:Chat:index.html.twig',
            array(
                'chats' => $chats,
                'personage' => $this->getPersonage()
            )
        );

    }

    /**
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException
     */
    public function getAjaxChatsAction(Request $request)
    {
        if (false === $this->canViewChat()) {
            return false;
        }

        // Utilizzo il last id per evitare di caricare chat già presenti.
        $startId = $request->getSession()->get('chat-last-id');

        // La chat è vuota, non potendo usare l'id carico da minuti.
        if (null === $startId) {
            $chats = $this->getDoctrine()
                ->getRepository('GdrGameBundle:Chat')
                ->getLatest($this->getCurrentLocation());
            // La chimata ajax è stata fatta dopo che la sessione è stata impostata.
        } else {
            $chats = $this->getDoctrine()
                ->getRepository('GdrGameBundle:Chat')
                ->getLatestForAjax($this->getCurrentLocation(), $startId);
        }

        // Recupero l'ultimo elemento solo se $chats non è vuoto.
        $lastItem = $chats ? end($chats) : false;

        if (false !== $lastItem) {
            // Le prossime azioni di getLatestFrom inizieranno dopo questo id.
            $this->getRequest()->getSession()->set('chat-last-id', $lastItem->getId());
        }

        return $this->render(
            'GdrGameBundle:Chat:chat.html.twig',
            array(
                'chats' => $chats,
                'personage' => $this->getPersonage()
            )
        );
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse|Response
     * @throws \Doctrine\ORM\EntityNotFoundException
     * @throws \Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException
     */
    public function inputAction(Request $request)
    {
        $personage = $this->getPersonage();

        // Se non sono in gioco significa che ho richiesto la pagina per la prima volta e mostro il bottone.
        if (false === $this->isInGame()) {
            $location = $this->getCurrentLocation();

            $canEnter = $personage->getIsDead() ? $location->getAllowSoul() : true;

            return $this->render(
                'GdrGameBundle:Chat:enterChat.html.twig',
                array('canEnter' => $canEnter)
            );
        }

        if (false === $this->canViewChat()) {
            return false;
        }

        // Se sono bannato, sloggami.
        $this->logoutIfBanned();

        $personage = $this->getPersonage();
        $chat = new Chat();
        $form = $this->createForm(new ChatType($this->getCurrentLocation(), $personage, $this->getChoicesCombat()), $chat);
        $form->handleRequest($request);

        $isSoul = false;
        $canWriteSoul = false;
        if ($personage->getIsSoul()) {
            $isSoul = true;
            $canWriteSoul = $personage->getOnline()->getLocation()->getAllowSoul();
        }

        // Recupero i permessi.
        $permissions = $this->get('gdr.permission');

        if ($request->isMethod('POST') && $form->isValid()) {

            if (false === $this->canViewChat()) {
                return false;
            }

            $race = $personage->getRace();
            $myRank = $this->getRightRank($personage);

            $chat->setSenderLevelIcon($myRank['rankPath']);
            $chat->setSenderRankName($myRank['rankName']);

            // Maschio o femmina per l'icona?
            if ($race->getFemaleRealIconName() && $race->getMaleRealIconName() && $personage->getUseRealRace()) {
                $iconRace = $personage->getGender() == Personage::MALE ? $race->getMaleRealIconName() : $race->getFemaleRealIconName();
            } else {
                $iconRace = $personage->getGender() == Personage::MALE ? $race->getMaleIconName() : $race->getFemaleIconName();
            }

            // Icona vestito.
            $dress = $this->getDoctrine()->getRepository('GdrItemsBundle:Inventory')
                ->findOneBy(array('personage' => $personage, 'isDressed' => true));

            if (null === $dress) {
                return new JsonResponse([
                    'error' => 'Non puoi inviare un azione senza avere un vestito indosso!'
                ]);
            }

            $session = $request->getSession();

            // Se sono un mannaro e la luna è piena, allora cambio il vestito.
            if ($personage->getRace()->getIsWerewolf() && $session->get('moon-change-wolf')) {
                $wolfDressName = $session->get('wolf-dress-name', "Mutaforma Lupo");
                $wolfDressIcon = $session->get('wolf-dress-icon', null);

                $chat->setSenderDressIcon(
                    $this->container->getParameter('item_upload_path') . '/' . $wolfDressIcon
                );
                $chat->setSenderDressName($wolfDressName);
            } else {
                $chat->setSenderDressIcon(
                    $this->container->getParameter('item_upload_path') . '/' . $dress->getItem()->getDressIconImageName()
                );
                $chat->setSenderDressName($dress->getItem()->getName());
            }

            $chat->setSender($personage);
            $chat->setSenderName($personage->getName());
            $chat->setSenderRace($race->getName());
            $chat->setSenderRaceIcon($this->container->getParameter('race_upload_path') . '/' . $iconRace);

            $chat->setLocation($this->getCurrentLocation());
            $this->setBodyAndType($chat, $form);

            // Se parlo un altra lingua controllo se posso davvero parlarla.
            if (null !== $chat->getLanguage()) {
                $chat->setRaceLanguage($chat->getLanguage()->getRace());
            }

            if ($isSoul) {
                if (($chat->getSpecial() == 'fate' || $chat->getSpecial() == 'mod')
                    || $chat->getType() == Chat::TYPE_WHISPER
                ) {
                    // OK, posso scrivere
                } else {
                    $chat->setSpecial('soul');
                }
            }

            if ($isSoul && $canWriteSoul === false) {
                return new JsonResponse(array(
                    'response' => false,
                ));
            }

            // Assegno la classe css.
            if ($personage->getName() == "Airon" || $personage->getName() == "Lafrast" || $personage->getName() == "Narcisse"
            ) {
                $chat->setCssClass("nobile");
            } elseif ($permissions->isMaster()) {
                $chat->setCssClass("master");
            }

            // Controllo se il cast è andato male. Deve essere qui come posizione.
            if ($chat->getSpecial() == "cast-lost") {
                return new JsonResponse(array(
                    'response' => true,
                    'message' => null,
                    'cast' => 'lost',
                ));
            }

            // Assegno un attacco?
            $combat = $form->get('combat')->getData();

            if ($combat && $combat != "0") {
                $chat->setCombat($combat);
            }

            $personageService = $this->get('gdr.personage');
            $this->addExperience($chat->getBody(), $personageService);

            $em = $this->getDoctrine()->getManager();
            $em->persist($chat);
            $em->flush();

            if ($chat->getSpecial() == 'cast-1') {
                $castReturn = 'start';
                // Preservo lo stato di cast-1.
                $request->getSession()->set('cast-I-active', true);
            } elseif ($chat->getSpecial() == 'cast-2') {
                $castReturn = 'end';
                // Rimuovo cast-1
                $request->getSession()->set('cast-I-active', false);
            } else {
                $castReturn = null;
                $request->getSession()->set('cast-I-active', false);
            }

            return new JsonResponse(array(
                'response' => true,
                'message' => null,
                'cast' => $castReturn,
            ));
        }

        // Se per qualche motivo posso lanciare il cast-2, lo mostro.

        return $this->render(
            'GdrGameBundle:Chat:input.html.twig',
            array(
                'form' => $form->createView(),
                'canFate' => $permissions->isFate(),
                'canModerateChat' => $permissions->isModChat(),
                'canUseSpells' => $permissions->canViewGrimory(1),
                'canRoll' => $this->getCurrentLocation()->getCanRoll(),
                'isSoul' => $isSoul,
                'canWriteSoul' => $canWriteSoul,
                'canCastII' => $request->getSession()->get('cast-I-active', false)
            )
        );
    }

    protected function setBodyAndType(Chat $chat, $form)
    {
        $em = $this->getDoctrine()->getManager();
        $personage = $this->getPersonage();
        $permissions = $this->getDoctrine()
            ->getRepository('GdrItemsBundle:Inventory');
        $body = $chat->getBody();

        // Controllo se è speciale e se ho i permessi.
        switch ($chat->getSpecial()) {
            case 'mod':
                if (!$permissions->canModerateChat($personage->getId())) {
                    throw new AccessDeniedHttpException();
                }
                break;

            case 'fate':
                if (!$permissions->canFate($personage->getId())) {
                    throw new AccessDeniedHttpException();
                }
                break;

            case 'fate-img':
                if (!$permissions->canFate($personage->getId())) {
                    throw new AccessDeniedHttpException();
                }

                break;

            case 'cast-1':
                if (!$permissions->canViewGrimory($personage->getId(), 1)) {
                    throw new AccessDeniedHttpException();
                }
                break;
            case 'cast-2':
                if (!$permissions->canViewGrimory($personage->getId(), 1)) {
                    throw new AccessDeniedHttpException();
                }
                $spell = $chat->getSpell();

                // Posso usarlo?
                $grimory = $this->getDoctrine()->getRepository('GdrUserBundle:Grimory')
                    ->findOneBy(array('personage' => $personage, 'spell' => $spell));

                if (null === $grimory || true === $grimory->getIsUsed()) {
                    throw new EntityNotFoundException();
                }

                $isCastI = $this->getDoctrine()->getRepository('GdrGameBundle:Chat')
                    ->getLastOneForCast($personage->getId());

                if (null === $isCastI) {
                    throw new EntityNotFoundException("Nessun cast trovato");
                }

                if ('cast-1' !== $isCastI->getSpecial()) {
                    $chat->setSpecial('cast-lost');
                }

                $chat->setCastBody($spell->getChatDescription());
                $grimory->setIsUsed(true);

                $em->persist($grimory);
                $em->flush();

                break;

            case "skill":
                // La skill è mia?
                $skill = $this->getDoctrine()->getRepository('GdrUserBundle:SkillLearned')
                    ->findOneBy(array('personage' => $personage, 'skill' => $chat->getSkill()));

                if (null === $skill) {
                    throw new AccessDeniedHttpException();
                }

                // Posso usarla?
                if ($skill->getCanUseAt() > new \DateTime()) {
                    throw new AccessDeniedHttpException();
                }

                $nextUse = new \DateTime();
                $nextUse->modify("+ {$skill->getSkill()->getHoursToReload()} hours");
                $skill->setCanUseAt($nextUse);
                $em->persist($skill);
                $em->flush();

                $chat->setSkill($skill->getSkill()->getDescription());
                $chat->setSpecial('skill');
                break;

            case "soul":
                break;

            case "":
                break;

            default:
                throw new AccessDeniedHttpException();
                break;
        }

        // E' un'azione se inizia con il carattere "+"
        if ($body[0] == "+") {
            $chat->setType(Chat::TYPE_ACTION);

            // Elimino il "+".
            $chat->setBody(substr($body, 1));

            if (null !== $personage->getTitle() && false === $personage->getIsSoul()) {
                $chat->setSenderName($personage->getTitle() . " " . $personage->getName());
            }

            // E' un sussurro
        } elseif (preg_match('#@([a-zA-Z,?]+)*@(.+)#is', $chat->getBody(), $matches)) {
            $chat->setType(Chat::TYPE_WHISPER);

            $destinatari = explode(',', $matches[1]);
            $destinatari = implode(', ', $destinatari);

            $chat->setReceiverWhispered(ucfirst(strtolower($destinatari)));

            $chat->setBody($matches[2]);
        } // Altrimenti è normale
        else {
            $chat->setType(Chat::TYPE_NORMAL);
            $chat->setBody($body);
        }
    }

    /**
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @throws \Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException
     */
    public function joinAction()
    {
        $online = $this->getPersonage()->getOnline();

        if ($online->getIsInGame()) {
            throw new AccessDeniedHttpException();
        }

        $online->setIsInGame(true);
        $online->setInGameEntered(new \DateTime());

        // Se esiste, elimina l'ultimo tag salvato.
        $this->getRequest()->getSession()->set('chat-last-tag', null);
        $this->getRequest()->getSession()->set('cast-I-active', false);

        $em = $this->getDoctrine()->getManager();
        $em->persist($online);
        $em->flush();

        return $this->redirect($this->generateUrl('chat-index'));
    }

    /**
     * Permette di uscire dal gioco, inserendo un tempo limite per usare la borsa.
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function leaveAction()
    {
        $online = $this->getPersonage()->getOnline();

        $online->setIsInGame(false);
        $online->setInGameEntered(null);
        $minutes = Inventory::INVENTORY_BLOCKED_MINUTES;
        $online->setInventoryBlockedUntil(new \DateTime("+{$minutes} minutes"));

        // Se esiste, elimina l'ultimo tag salvato.
        $this->getRequest()->getSession()->set('chat-last-tag', null);
        $this->getRequest()->getSession()->set('cast-I-active', false);

        $em = $this->getDoctrine()->getManager();
        $em->persist($online);
        $em->flush();

        return $this->redirect($this->generateUrl('chat-index'));
    }

    /**
     * Visualizza alcune informazioni del personaggio.
     *
     * @param $name
     *
     * @return JsonResponse
     * @throws \Doctrine\ORM\EntityNotFoundException
     */
    public function pgInfosAction($name)
    {
        $personage = $this->getDoctrine()
            ->getRepository('GdrUserBundle:Personage')
            ->getInfosPersonageForChat($name);

        $pgService = $this->get('gdr.personage');

        if (null === $personage) {
            return new Response("Personaggio non esistente");
        }

        $skin = null;
        if ($personage->getSkinColor()) {
            $skin = $personage->getSkinColor()->getName();
        } elseif ($personage->getSquamaColor()) {
            $skin = $personage->getSquamaColor()->getName();
        } else {
            $skin = $personage->getFurColor()->getName();
        }

        $capelli = $personage->getHairColor() ? $personage->getHairColor()->getName() : '-';
        $fateNote = $personage->getFateNote() ? $personage->getFateNote() : '-';

        if ($personage->getUseRealRace()){
            /*$raceName = $personage->getRace()->getIsWerewolf() ? "Mannaro" : "Vampiro";*/
            $raceName = $personage->getRace()->getpublicName();
        }else{
            $raceName = $personage->getRace()->getName();
        }

        $response = array(
            'Razza: ' . $raceName,
            'Liv. di Razza: ' . $personage->getRaceLevel(),
            'Fascia di età: ' . $personage->getSkillsLevel()->getName(),
            'Forza: ' . $personage->getStrength() . " (" . $pgService->showDiffStrength($this->getPersonage(), $personage) . ")",
            'Saggezza: ' . $personage->getSapience(),
            'Altezza: ' . $personage->getHeight(),
            'Peso: ' . $personage->getWeight(),
            'Occhi: ' . $personage->getEyeColor()->getName(),
            'Capelli: ' . $capelli,
            'Pelle/Pelo/Squame: ' . $skin,
            'Note del fato: ' . $fateNote
        );

        $data = "<ul>";
        foreach ($response as $r) {
            $data .= "<li>{$r}</li>";
        }
        $data .= "</ul>";

        $response = new Response($data);

        return $response;
    }

    /**
     * Visualizza alcune info del personaggio.
     *
     * @param $name
     *
     * @return JsonResponse
     */
    public function pgItemsAction($name)
    {
        $inventories = $this->getDoctrine()
            ->getRepository('GdrItemsBundle:Inventory')
            ->findEquipForChat($name);

        $personage = $this->getDoctrine()->getRepository('GdrUserBundle:Personage')
            ->findOneBy(array("name" => $name));

        // Vestito indossato
        $vestito = $this->getDoctrine()->getRepository('GdrItemsBundle:Inventory')
            ->getDressedItem($personage->getId());

        $return = "<ul>";
//        $return .= "<li>Livello combattente: {$personage->getCombatLevel()}</li>";
        $return .= "<li>Vestito: {$vestito}</li>";
        foreach ($inventories as $i) {
            $return .= "<li>{$i['itemName']}</li>";
        }
        $return .= "</ul>";

        return new Response($return);
    }

    /**
     * Visualizza il vestito di un personaggio.
     *
     * @param $name
     *
     * @return JsonResponse
     */
    public function pgDressAction($name)
    {
        $response = "<ul><li>Vestito: $name</li></ul>";

        return new Response($response);
    }

    public function onlineListAction()
    {
        $location = $this->getCurrentLocation();

        // Deve essere in una chat, altrimenti blocco.
        if ($location->getType() !== Location::TYPE_CHAT && $location->getType() !== Location::TYPE_HOUSE) {
            throw new AccessDeniedHttpException();
        }

        $onlines = $this->getDoctrine()->getRepository('GdrUserBundle:Online')
            ->getPersonagesOnlineForChat($location->getId());

        return $this->render(
            'GdrGameBundle:Chat:onlines.html.twig',
            array(
                'onlines' => $onlines,
                'path_item' => $this->container->getParameter('item_upload_path'),
                'path_race' => $this->container->getParameter('race_upload_path')
            )
        );
    }

    public function passaMoriAction($formSended)
    {
        $online = $this->getPersonage()->getOnline();
        $personage = $this->getPersonage();

        // Sono in gioco?
        if (false === $online->getIsInGame() || $personage->getIsSoul()) {
            throw new AccessDeniedHttpException("passaMoriAction, non sono in gioco.");
        }

        $request = $this->getRequest();

        $form = $this->createFormBuilder()
            ->add(
                'destinatario',
                'choice',
                array(
                    'choices' => $this->getDoctrine()->getRepository('GdrUserBundle:Online')
                            ->getPersonagesOnlineByLocationForChat($online->getLocation(), $personage->getId()),
                    'constraints' => array(
                        new NotBlank(),
                        new Type(array(
                            'type' => 'integer'
                        ))
                    ),
                    'required' => true
                )
            )
            ->add(
                'mori',
                'text',
                array(
                    'constraints' => array(
                        new NotBlank(),
                    ),
                    'required' => true
                )
            )
            ->getForm();

        if ($formSended) {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $formMori = $form->getData()['mori'];
                $formDestinatario = $form->getData()['destinatario'];

                // I mori sono sufficienti?
                if ($formMori > $personage->getBagAmount()) {
                    return new JsonResponse(array(
                        'response' => false,
                        'msg' => "<strong>Attenzione:</strong> non avete con voi questa quantità di Mori."
                    ));
                }

                // Il destinatario è attivo in questa chat?
                $destinatario = $this->getDoctrine()->getRepository('GdrUserBundle:Personage')
                    ->findOneBy(array('id' => $formDestinatario));

                if (null === $destinatario) {
                    throw new EntityNotFoundException();
                }

                if (false === $destinatario->getOnline()->getIsInGame()
                    && $destinatario->getOnline()->getLocation() !== $online->getLocation()
                ) {
                    return new JsonResponse(array(
                        'response' => false,
                        'msg' => "<strong>Attenzione:</strong> il Personaggio cui volete passare qualcosa deve essere presente nello stesso luogo dove vi trovate voi"
                    ));
                }

                // Può trasportare la moneta?
                if ($destinatario->getBagAmount() + $formMori > BankController::BAG_AMOUNT_LIMIT) {
                    return new JsonResponse(array(
                        'response' => false,
                        'msg' => "<strong>Attenzione:</strong> il Personaggio non può trasportare tutta questa quantità di Mori."
                    ));
                }

                // Aggiorno il mio conto e quello del destinatario
                $personage->setBagAmount($personage->getBagAmount() - $formMori);
                $destinatario->setBagAmount($destinatario->getBagAmount() + $formMori);

                // Scrivo il messaggio in chat
                $messaggio = new Chat();
                $messaggio->setLocation($online->getLocation());
                $messaggio->setSender($personage);
                $messaggio->setSenderName($personage->getName());
                $messaggio->setType(Chat::TYPE_SYSTEM);
                $messaggio->setSpecial('system');
                $messaggio->setBody(
                    "{$personage->getName()} ha passato un sacchetto di Mori a {$destinatario->getName()}."
                );
                $messaggio->setExtra($formMori);
                $messaggio->setReceiverWhispered($destinatario->getName());

                $em = $this->getDoctrine()->getManager();
                $em->persist($destinatario);
                $em->persist($personage);
                $em->persist($messaggio);
                $em->flush();

                // Loggo.
                $bankLogger = $this->get('gdr.banklogger');
                $bankLogger->log($formMori, $destinatario, $personage, "Avete passato dei Mori a {$destinatario->getName()} dalla vostra Borsa.", TransactionType::PASSAGGIO, false);
                $bankLogger->log($formMori, $personage, $destinatario, "Avete ricevuto dei Mori da {$personage->getName()}.", TransactionType::PASSAGGIO);

                return new JsonResponse(array(
                    'response' => true
                ));

            } else {
                return new JsonResponse(array(
                    'response' => false,
                    'msg' => "<strong>Attenzione:</strong> tutti i campi sono obbligatori."
                ));
            }
        }

        return $this->render(
            'GdrGameBundle:Chat:passaMori.html.twig',
            array(
                'form' => $form->createView(),
                'mori' => $personage->getBagAmount()
            )
        );
    }

    public function passaOggettiAction($formSended)
    {
        $online = $this->getPersonage()->getOnline();
        $personage = $this->getPersonage();
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getManager();

        // Sono in gioco?
        if (false === $online->getIsInGame() || $personage->getIsSoul()) {
            throw new AccessDeniedHttpException();
        }

        $form = $this->createFormBuilder()
            ->add(
                'destinatario',
                'choice',
                array(
                    'choices' => $this->getDoctrine()->getRepository('GdrUserBundle:Online')
                            ->getPersonagesOnlineByLocationForChat($online->getLocation(), $personage->getId()),
                    'constraints' => array(
                        new NotBlank(),
                        new Type(array(
                            'type' => 'integer'
                        ))
                    ),
                    'required' => true
                )
            )
            ->add(
                'inventories',
                'choice',
                array(
                    'choices' => $this->getDoctrine()->getRepository('GdrItemsBundle:Inventory')
                            ->getTransferableItemsForChat($personage->getId()),
                    'constraints' => array(
                        new NotBlank()
                    ),
                    'required' => true,
                    'multiple' => true
                )
            )
            ->getForm();

        if ($formSended) {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $formInventories = $form->getData()['inventories'];
                $formDestinatario = $form->getData()['destinatario'];

                $inventories = $this->getDoctrine()->getRepository('GdrItemsBundle:Inventory')
                    ->findInventoriesByIds($personage->getId(), $formInventories);

                $destinatario = $this->getDoctrine()->getRepository('GdrUserBundle:Personage')
                    ->findOneBy(array('id' => $formDestinatario));

                if (null === $inventories || null === $destinatario) {
                    throw new EntityNotFoundException();
                }

                $totalTransferWeight = 0;
                $itemsName = [];

                // Calcolo il peso totale.
                foreach ($inventories as $i) {
                    $totalTransferWeight += $i->getItem()->getWeight();
                    $itemsName[] = $i->getItem()->getName();
                }

                // Quanto trasporta il destinatario?
                $totalPgWeight = $this->getDoctrine()->getRepository('GdrItemsBundle:Inventory')
                    ->getTotalBagWeight($destinatario->getId());

                if ($totalTransferWeight > Inventory::BAG_LIMIT - $totalPgWeight) {
                    return new JsonResponse(array(
                        'response' => false,
                        'msg' => "<strong>Attenzione:</strong> il Personaggio cui volete passare qualcosa è sovraccarico."
                    ));
                }

                foreach ($inventories as $i) {
                    $i->setPersonage($destinatario);
                    $em->persist($i);
                }
                $messaggio = new Chat();
                $messaggio->setLocation($online->getLocation());
                $messaggio->setSender($personage);
                $messaggio->setSenderName($personage->getName());
                $messaggio->setType(Chat::TYPE_SYSTEM);
                $messaggio->setSpecial('system');
                $messaggio->setBody(
                    "{$personage->getName()} ha passato qualcosa a {$destinatario->getName()}."
                );
                $messaggio->setReceiverWhispered($destinatario->getName());
                $messaggio->setExtra(implode(", ", $itemsName));

                $em->persist($messaggio);
                $em->flush();

                return new JsonResponse(array(
                    'response' => true
                ));

            } else {
                return new JsonResponse(array(
                    'response' => false,
                    'msg' => "<strong>Attenzione:</strong> tutti i campi sono obbligatori."
                ));
            }
        }

        return $this->render(
            'GdrGameBundle:Chat:passaOggetti.html.twig',
            array(
                'form' => $form->createView()
            )
        );
    }

    public function rollDiceAction()
    {
        $online = $this->getPersonage()->getOnline();
        $personage = $this->getPersonage();
        $em = $this->getDoctrine()->getManager();

        // Si può lanciare il dato?
        if (false === $online->getLocation()->getCanRoll()) {
            throw new AccessDeniedHttpException();
        }

        $result = mt_rand(1, 100);

        $messaggio = new Chat();
        $messaggio->setLocation($online->getLocation());
        $messaggio->setSender($personage);
        $messaggio->setSenderName($personage->getName());
        $messaggio->setType(Chat::TYPE_SYSTEM);
        $messaggio->setSpecial('system');
        $messaggio->setBody(
            "{$personage->getName()} ha tirato un dado con il risultato di {$result}."
        );

        $em->persist($messaggio);
        $em->flush();

        return new JsonResponse(array(
            'response' => true
        ));
    }

    protected function addExperience($body, PersonageService $personageService)
    {
        $session = $this->getRequest()->getSession();

        $lastTime = $session->get('lastChatTime', new \DateTime('-3 minutes'));

        if (strlen($body) >= 300 && $lastTime <= new \DateTime("-3 minutes")) {
            $session->set('lastChatTime', new \DateTime());
            $em = $this->getDoctrine()->getManager();

            $pg = $this->getPersonage();
            $pg->setExperience($pg->getExperience() + 1);
            $pg->setGlobalExperience($pg->getGlobalExperience() + 1);

            $em->flush($pg);

            $personageService->canAddLevel($this->getPersonage());
            $personageService->canAdvanceChatCombatPoint($this->getPersonage());
        }
    }

    public function downloadAction(Request $request)
    {
        $enteredTime = $this->getPersonage()->getOnline()->getInGameEntered();

        if (null !== $enteredTime) {
            $startTime = $enteredTime->modify('-15 minutes');

            $whisperer = (bool) $request->request->get('whisperOn', false);

            $chats = $this->getDoctrine()
                ->getRepository('GdrGameBundle:Chat')
                ->getLatest($this->getCurrentLocation(), $startTime, $whisperer);

            $fileName = "Shenteon - " . $this->getCurrentLocation()->getName() . " del " . date('d/m/Y H:i');

            $file = $this->renderView(
                'GdrGameBundle:Chat:download.html.twig',
                array('chats' => $chats, 'personage' => $this->getPersonage(), 'title' => $fileName)
            );

            $response = new Response($file);
            $response->headers->set('Content-Disposition', 'attachment; filename="' . $fileName . '"');

            return $response;
        }

        return new Response();
    }

    public function downloadFormAction(){
        return $this->render('@GdrGame/Chat/chatForm.html.twig');
    }

    public function callModAction()
    {
        $startTime = new \DateTime('-20 minutes');

        $chats = $this->getDoctrine()
            ->getRepository('GdrGameBundle:Chat')
            ->getLatest($this->getCurrentLocation(), $startTime);

        $log = $this->renderView('@GdrGame/Chat/segnala.html.twig', array("chats" => $chats));
        $log .= "<hr> <p><strong>Motivazione:</strong> " . $this->getRequest()->get('motivo') . "</p>";

        $category = $this->getDoctrine()->getRepository('GdrGameBundle:ForumCategory')
            ->findOneBy(array('helpDesk' => 2));

        $thread = new ForumThread();
        $thread->setCategory($category);
        $thread->setTitle(
            "[SEGNALAZIONE DA CHAT] Segnalazione di {$this->getPersonage()->getName()} in " . $this->getCurrentLocation()->getName()
        );

        $post = new ForumPost();
        $post->setThread($thread);
        $post->setBody($this->get('exercise_html_purifier.default')->purify($log));
        $post->setAuthor($this->getPersonage());
        $post->setAuthorName($this->getPersonage()->getName());
        $post->setAuthorRaceName($this->getPersonage()->getRace()->getName());
        $post->setIsFirstPost(true);

        if ($this->getPersonage()->getGender() == Personage::MALE) {
            $post->setAuthorRaceIcon($this->getPersonage()->getRace()->getMaleIconName());
        } else {
            $post->setAuthorRaceIcon($this->getPersonage()->getRace()->getFemaleIconName());
        }

        $em = $this->getDoctrine()->getManager();
        $em->persist($thread);
        $em->persist($post);
        $em->flush();

        // Invio missiva ai moderatori online.
        $mods = $this->getDoctrine()->getRepository('GdrUserBundle:Personage')
            ->getOnlinePersonagesModerator();
        $general = $this->get('gdr.game_bundle.general');
        $link = $this->generateUrl('bacheca-show-thread', array('id' => $thread->getId()));
        $testo = "<p>E' stata fatta una segnalazione da una chat: <a href='" . $link . "'>leggi</a>.</p>";

        foreach ($mods as $mod) {
            $general->createSystemLetter($testo, $mod->getId(), 'Moderazione');
        }

        return new Response();
    }

    public function bagAction($id, $type)
    {
        $personage = $this->getPersonage();

        if (false === $personage->getOnline()->getIsInGame()) {
            throw new AccessDeniedHttpException();
        }

        // L'oggetto è mio?
        $inventory = $this->getDoctrine()->getRepository('GdrItemsBundle:Inventory')
            ->findOneBy(array('personage' => $personage, 'id' => $id));

        if (null === $inventory) {
            throw new EntityNotFoundException();
        }

        $em = $this->getDoctrine()->getManager();
        $online = $this->getPersonage()->getOnline();
        $messaggio = new Chat();

        // Voglio mostrare l'oggetto.
        if ($type == 'show') {
            $nameItem = $inventory->getItem()->getName() . ' (' . $inventory->getItem()->getType()->getName() . ')';
            $messaggio->setBody(
                "{$personage->getName()} mostra {$nameItem}"
            );

            // Voglio mostrare il suo effetto in chat.
        } elseif ($type == 'activate' && $inventory->getItem()->getActiveDescription()) {
            $description = $inventory->getItem()->getActiveDescription();
            $messaggio->setBody(
                "{$personage->getName()} {$description}"
            );

            // Voglio sacrificare l'oggetto
        } elseif ($type == 'sacrify' && $inventory->getItem()->getExpendableDescription()) {
            $description = $inventory->getItem()->getExpendableDescription();
            $messaggio->setBody("{$personage->getName()} {$description}");

            $em->remove($inventory);
        } elseif ($type == 'dress' && $inventory->getItem()->getType()->getName() == ItemType::VESTITI) {
            $description = $personage->getName() . " ha cambiato vestito in " . $inventory->getItem()->getName();
            $messaggio->setBody($description);

            // Recupero l'attuale vestito indossato e lo metto false.
            $dressed = $this->getDoctrine()->getRepository('GdrItemsBundle:Inventory')
                ->findBy(array('personage' => $personage, 'isDressed' => true));

            foreach ($dressed as $dress) {
                $dress->setIsDressed(false);
                $em->persist($dress);
            }
            $em->flush();

            // Metto il nuovo vestito su indossato.
            $inventory->setIsDressed(true);
            $em->persist($inventory);
            $em->flush();
        } else {
            throw new AccessDeniedHttpException();
        }

        $messaggio->setLocation($online->getLocation());
        $messaggio->setSender($personage);
        $messaggio->setSenderName($personage->getName());
        $messaggio->setType(Chat::TYPE_SYSTEM);
        $messaggio->setSpecial('system');

        $em->persist($messaggio);
        $em->flush();

        return new JsonResponse(array(
            'response' => true
        ));
    }

    public function showSkillAction()
    {
        $personage = $this->getPersonage();

        $skills = $this->getDoctrine()->getRepository('GdrUserBundle:SkillLearned')
            ->findSkillsLearnedForChat($personage->getId());

        $totalLearnedSkills = count($skills);
        $maxLevelSkills = Skill::MAX_LEVEL;

        $randomLearnedSkills = $this->getDoctrine()->getRepository('GdrUserBundle:SkillLearned')
            ->getRandomSkillForPlayer($personage);


        return $this->render(
            'GdrGameBundle:Chat:skills.html.twig',
            array(
                'skills' => $skills,
                'randomSkills' => $randomLearnedSkills,
                'now' => new \DateTime(),
                'uploadPath' => $this->container->getParameter('skill_upload_path') . '/',
                'totalLearnedSkills' => $totalLearnedSkills,
                'maxLevelSkills' => $maxLevelSkills,
            )
        );
    }

    public function showItemAction($name)
    {
        $item = $this->getDoctrine()->getRepository('GdrItemsBundle:Item')
            ->findOneBy(array(
                'name' => $name
            ));

        if (null === $item) {
            throw new EntityNotFoundException('Item non trovato.');
        }

        return $this->render(
            'GdrAvatarBundle:Inventory:item.html.twig',
            array(
                'item' => $item
            )
        );
    }

    protected function canViewChat()
    {
        $location = $this->getCurrentLocation();

        if ($this->getCurrentLocation(true, true) !== $location) {
            return false;
        }

        return $this->getPersonage()->getIsDead() ? $location->getAllowSoul() : true;
    }

    protected function getChoicesCombat()
    {
        $sets = $this->getDoctrine()->getRepository('GdrGameBundle:CombatSet')
            ->getSetsByPersonageArray($this->getPersonage()->getId());
        $return = array();
        $return[0] = "Scegli Set Combattimento:";
        $cs = $this->get('gdr.combat');

        foreach ($sets as $set) {
            $setName = $set[0]['name'];
            $level = $cs->getDescriptionForLevel($set['level']);
            $completeName = $setName . " - " . $level . " (Step " . $set['level'] . ")";

            $return[$completeName] = $completeName;
        }

        return $return;
    }
}