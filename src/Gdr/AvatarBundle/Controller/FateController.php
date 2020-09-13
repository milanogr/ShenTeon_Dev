<?php

namespace Gdr\AvatarBundle\Controller;

use Gdr\AvatarBundle\Form\Type\NewDeathType;
use Gdr\AvatarBundle\Form\Type\NewRebornType;
use Gdr\GameBundle\Entity\ForumCategory;
use Gdr\UserBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class FateController extends Controller
{

    public function indexAction()
    {
        $this->canView();

        $form = $this->createForm(new NewDeathType());
        $form2 = $this->createForm(new NewRebornType());
        $request = $this->getRequest();

        $form->handleRequest($request);
        $form2->handleRequest($request);

        // Nuova morte
        if ($form->isValid()) {

            $personage = $this->getDoctrine()->getRepository("GdrUserBundle:Personage")
                ->findOneBy(
                    array(
                        "name" => $form->get("name")->getData(),
                    )
                );

            $em = $this->getDoctrine()->getManager();
            $service = $this->get("gdr.race.service");
            $service->killPersonage($personage);

            $em->persist($personage);
            $em->flush();

            return $this->redirect($this->generateUrl("fato-index"));
        }

        // Nuova rinascita
        if ($form2->isValid()) {

            $personage = $this->getDoctrine()->getRepository("GdrUserBundle:Personage")
                ->findSoulByName($form2->get("name")->getData());

            $service = $this->get("gdr.race.service");
            $service->fateRebornPersonage($personage);

            return $this->redirect($this->generateUrl("fato-index"));
        }

        return $this->render(
            'GdrAvatarBundle:Fate:index.html.twig',
            array(
                "form" => $form->createView(),
                "form2" => $form2->createView()
            )
        );
    }

    public function canView()
    {
        if (false === $this->getPermission()->isFate()) {
            throw new AccessDeniedHttpException("Tentativo di accesso al pannello fate da parte di " . $this->getPersonage(
            )->getId());
        }
    }
}
