<?php

namespace Gdr\AvatarBundle\Controller;

use Gdr\AvatarBundle\Form\Type\EsilioType;
use Gdr\UserBundle\Controller\Controller;
use Gdr\UserBundle\Entity\Esilio;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class ModController extends Controller
{
    public function esilioAction()
    {
        $this->canView();

        $esili = $this->getDoctrine()->getRepository('GdrUserBundle:Esilio')
            ->getSortedQuery();

        $paginator = $this->get('knp_paginator')->paginate($esili, $this->getRequest()->query->get('page', 1), 20);

        $esilio = new Esilio();
        $form = $this->createForm(new EsilioType(), $esilio);

        $form->handleRequest($this->getRequest());

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $date = new \DateTime("+ {$esilio->getDays()} days");

            $esilio->setUntil($date);
            $esilio->setModerator($this->getPersonage());
            $esilio->setBanned($form->get("personage")->getData()->getUser());
            $em->persist($esilio);
            $em->flush();

            // Sloggo il banned.
            $online = $this->getDoctrine()->getRepository('GdrUserBundle:Online')
                ->findOneBy(array("personage" => $form->get("personage")->getData()));

            if (null !== $online) {
                $em->remove($online);
                $em->flush();

            }

            $url = $this->generateUrl('mod-esilio');

            return $this->redirect($url);
        }

        return $this->render(
            '@GdrAvatar/Mod/esilio.html.twig',
            array(
                'paginator' => $paginator,
                'form' => $form->createView()
            )
        );
    }

    public function showLastRegisteredAction()
    {
        $this->canView();

        $personages = $this->getDoctrine()->getRepository("GdrUserBundle:Personage")
            ->getLastRegistered();

        return $this->render(
            "@GdrAvatar/Mod/lastRegistered.html.twig",
            array(
                "personages" => $personages
            )
        );
    }

    public function sameIpsAction()
    {
        $this->canView();

//        $ips = $this->getDoctrine()->getRepository('GdrGameBundle:LoginArchive')
//            ->findSameIps();

        $ips = [];

        return $this->render(
            "@GdrAvatar/Mod/sameIps.html.twig",
            array(
                "ips" => $ips
            )
        );
    }

    public function canView(){
        if (false === $this->getPermission()->isMod()){
            throw new AccessDeniedHttpException("Tentativo di accesso al pannello mod da parte di ". $this->getPersonage()->getId());
        }
    }
}