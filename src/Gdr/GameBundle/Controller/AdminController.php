<?php
/**
 * Created by JetBrains PhpStorm.
 * User: diego
 * Date: 20/09/13
 * Time: 23:30
 * To change this template use File | Settings | File Templates.
 */

namespace Gdr\GameBundle\Controller;

use Doctrine\ORM\EntityNotFoundException;
use Gdr\AvatarBundle\Entity\Experience;
use Gdr\GameBundle\Form\Type\EditPgStep1Type;
use Gdr\GameBundle\Form\Type\EditPgStep2Type;
use Gdr\UserBundle\Controller\Controller;
use Gdr\UserBundle\Entity\Language;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class AdminController extends Controller
{
    public function assignItemAction(Request $request)
    {
        $this->canView();

        $form = $this->createFormBuilder()
            ->add('item', 'integer')
            ->add('quantity', 'integer')
            ->add('destinatario', 'text')
            ->getForm();

        $errors = array();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $itemF = $form->get('item')->getData();
            $quantityF = $form->get('quantity')->getData();
            $destinatarioF = $form->get('destinatario')->getData();

            if (!$itemF || !$quantityF || !$destinatarioF) {
                $errors[] = "Tutti i campi devono essere compilati";
            }

            $item = $this->getDoctrine()->getRepository('GdrItemsBundle:Item')
                ->find($itemF);

            if (null === $item) {
                $errors[] = "ID oggetto non esistente";
            } else {
                $destinatario = $this->getDoctrine()->getRepository('GdrUserBundle:Personage')
                    ->findOneBy(array('name' => ucfirst($destinatarioF)));

                if (null === $destinatario) {
                    $errors[] = "Nome Destinatario non esistente";
                }
            }

            if (empty($errors)) {
                $this->get('gdr.game_bundle.general')->itemsToInventory($quantityF, $destinatario, $item);

                $this->get('session')->getFlashBag()->add(
                    'success',
                    "{$item->getName()} x{$quantityF} è stato assegnato con successo a {$destinatario->getName()} "
                );

                return $this->redirect($this->generateUrl('g-admin-items'));
            }
        }

        return $this->render(
            'GdrGameBundle:Admin:assignItem.html.twig',
            array(
                'form' => $form->createView(),
                'errors' => $errors
            )
        );
    }

    /*
     * Mostra in dropdown le location esistenti. Cliccando "conferma", si apre la relativa mappa con il drag.
     */
    public function chooseLocationAction()
    {
        $this->canView();

        $locations = $this->getDoctrine()->getRepository('GdrGameBundle:Location')
            ->getLocationsForMaps();

        return $this->render(
            'GdrGameBundle:Admin:chooseLocation.html.twig',
            array(
                "locations" => $locations
            )
        );
    }

    public function showLocationAction($id)
    {
        $this->canView();

        $location = $this->getDoctrine()->getRepository('GdrGameBundle:Location')
            ->find($id);

        return $this->render(
            'GdrGameBundle:Admin:showLocation.html.twig',
            array(
                "location" => $location
            )
        );
    }

    public function savePositionAction($id, $top, $left)
    {
        $this->canView();

        $location = $this->getDoctrine()->getRepository('GdrGameBundle:Location')
            ->find($id);

        $location->setIconPosY($top);
        $location->setIconPosX($left);
        $em = $this->getDoctrine()->getManager();
        $em->persist($location);
        $em->flush();

        return new Response();
    }

    public function assignProperty()
    {
        $this->canView();

        $properties = $this->getDoctrine()->getRepository('GdrItemsBundle:Property')
            ->getAllWithoutOwner();

        return $this->render("");
    }

    public function editPersonageAction($step = 1)
    {
        $this->canView();

        $em = $this->getDoctrine()->getManager();
        $request = $this->getRequest();

        $data = $request->getSession()->get("step1-data", array());

        if ($step == 1) {

            $form = $this->createFormBuilder()
                ->add("personage", "name_selector")
                ->add(
                    "race",
                    "entity",
                    array(
                        "label" => "Scegli la razza",
                        "class" => "GdrRaceBundle:Race"
                    )
                )
                ->getForm();

            if ($request->isMethod('POST')) {
                $form->handleRequest($request);
                if ($form->isValid()) {
                    $data = $form->getData();
                    $request->getSession()->set(
                        "step1-data",
                        array(
                            "personage" => $data["personage"]->getId(),
                            "race" => $data["race"]->getId(),
                            "is_done" => true
                        )
                    );

                    return $this->redirect($this->generateUrl("g-edit-pg-step"));
                } else {
                }
            } else {

                $data_race = isset($data["race"]) ? $data["race"] : null;

                if (!is_null($data_race)) {
                    $race = $this->getDoctrine()->getRepository("GdrRaceBundle:Race")->findOneBy(
                        array(
                            "id" => $data["race"]
                        )
                    );
                } else {
                    $race = null;
                }
                $form->setData(
                    array(
                        "race" => $race
                    )
                );
            }

            return $this->render(
                'GdrGameBundle:Admin:editPersonage.html.twig',
                array('form' => $form->createView())
            );


        } elseif ($step == 2) {

            if (!$data['is_done']) {
                $url = $this->generateUrl('g-edit-pg');
                $this->redirect($url);
            }

            $newRace = $this->getDoctrine()->getRepository("GdrRaceBundle:Race")->findOneBy(
                array(
                    "id" => $data["race"]
                )
            );

            if (null === $newRace) {
                $url = $this->generateUrl('g-edit-pg');
                $this->redirect($url);
            }


            $pg = $this->getDoctrine()->getRepository('GdrUserBundle:Personage')
                ->find($data['personage']);

            if (null === $pg) {
                throw new EntityNotFoundException();
            }

            // La razza è stata cambiata?
            $oldRace = $pg->getRace();
            $isRaceChanged = $newRace != $oldRace;

            $form = $this->createForm(new EditPgStep2Type($newRace), $pg);
            $form->handleRequest($request);

            if ($form->isValid()) {

                $pg->setRace($newRace);
                /**
                 * @var \Gdr\RaceBundle\Service\Service
                 */
                $service = $this->get("gdr.race.service");
                $pg = $service->rebornPersonage($pg, $pg->getAge(), false, false);

                // Aggiungo la lingua di base se esiste.
                if ($newRace->getUseRaceLanguage()) {
                    $language = new Language();
                    $language->setPersonage($pg);
                    $language->setRace($newRace);
                    $em->persist($language);
                }

                // Se la razza è cambiata:
                //  - rimuovo le skills imparate;
                //  - sommo la nuova esperienza;
                //  - azzero l'esperienza di razza;
                if ($isRaceChanged) {
                    $skillsLearned = $this->getDoctrine()->getRepository('GdrUserBundle:SkillLearned')
                        ->findBy(array("personage" => $pg));

                    foreach ($skillsLearned as $skill) {
                        $em->remove($skill);
                    }

                    $pg->setExperience(0);
                    $pg->setRaceLevel(1);

                    $exp = new Experience();
                    $exp->setPersonage($pg);
                    $exp->setBody(
                        strtoupper($pg->getName()) . ", per l’imperscrutabile intervento della Magia, vede mutare
                la sua razza da " . strtoupper($oldRace->getName()) . " a " . strtoupper($newRace->getName()) . "."
                    );

                    $em->persist($exp);
                }

                $em->persist($pg);
                $em->flush();

                $this->get('session')->getFlashBag()->add(
                    'success',
                    "Il personaggio {$pg->getName()} è stato modificato!"
                );

                return $this->redirect($this->generateUrl("g-edit-pg"));
            }


            $rl_rep = $this->getDoctrine()->getRepository("GdrRaceBundle:RaceLevel");
            $race_level = $rl_rep->findByAgeAndRaceId($newRace->getAgeMin(), $newRace);

            return $this->render(
                'GdrGameBundle:Admin:editPersonage2.html.twig',
                array(
                    'form' => $form->createView(),
                    'raceLevel' => $race_level,
                    'race' => $newRace
                )
            );
        }

        return new Response("ASD");
    }

    public function canView()
    {
        if (false === $this->getPermission()->isAdmin()) {
            throw new AccessDeniedHttpException("Tentativo di accesso al pannello admin da parte di " . $this->getPersonage()->getId());
        }
    }

    public function shopListAction()
    {
        $this->canView();

        $shops = $this->getDoctrine()->getRepository('GdrItemsBundle:Property')
            ->getAllWithOwnerForAdmin();

        return $this->render('GdrGameBundle:Admin:shopList.html.twig', compact('shops'));

    }
}