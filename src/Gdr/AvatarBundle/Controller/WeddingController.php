<?php

namespace Gdr\AvatarBundle\Controller;

use Gdr\AvatarBundle\Entity\Experience;
use Gdr\AvatarBundle\Form\Type\NewWeddingType;
use Gdr\GameBundle\Entity\ForumCategory;
use Gdr\UserBundle\Controller\Controller;
use Gdr\UserBundle\Entity\Wedding;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class WeddingController extends Controller
{
    public function indexAction()
    {
        $this->canMarry();

        $wedding = new Wedding();
        $form = $this->createForm(new NewWeddingType(), $wedding);
        $request = $this->getRequest();

        if ($form->handleRequest($request)) {
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $wedding->setOfficiate($this->getPersonage()->getName());

                $em->persist($wedding);
                $em->flush();

                $bride = $wedding->getBride();
                $bride->setWidowOf(null);
                $bride->setMarriedWith($wedding->getGroom());

                $em->persist($bride);
                $em->flush();

                $groom = $wedding->getGroom();
                $groom->setWidowOf(null);
                $groom->setMarriedWith($bride);

                $em->persist($groom);
                $em->flush();

                $expText = strtoupper($this->getPersonage()->getName())." ha oggi sposato ".strtoupper($bride->getName())."
                e ".strtoupper($groom->getName())." tramite: ".$wedding->getType();

                $expBride = new Experience();
                $expBride->setPersonage($bride);
                $expBride->setBody($expText);

                $expGroom = new Experience();
                $expGroom->setPersonage($groom);
                $expGroom->setBody($expText);

                $em->persist($expBride);
                $em->persist($expGroom);
                $em->flush();

                return $this->redirect($this->generateUrl("matrimoni-index"));
            }

        }

        $weddings = $this->getDoctrine()->getRepository("GdrUserBundle:Wedding")->getActiveMarriages();
        $page = $this->getRequest()->query->get('page', 1);
        $paginator = $this->get('knp_paginator')->paginate($weddings, $page, 20);

        return $this->render(
            'GdrAvatarBundle:Wedding:index.html.twig',
            array(
                "form" => $form->createView(),
                'paginator' => $paginator
            )
        );
    }

    public function divorceAction($id)
    {
        $this->canMarry();

        $wedding = $this->getDoctrine()->getRepository("GdrUserBundle:Wedding")
            ->findOneBy(
                array(
                    "isDivorced" => false,
                    "id" => $id
                )
            );

        if (is_null($wedding)) {
            // ERRORE
        } else {
            $wedding->setOfficiateDivorce($this->getPersonage()->getName());
            $wedding->setEndedAt(new \DateTime());
            $wedding->setIsDivorced(true);

            $bride = $wedding->getBride();
            $groom = $wedding->getGroom();

            $em = $this->getDoctrine()->getManager();
            $em->persist($wedding);
            $em->flush();

            $groom->setMarriedWith(null);
            $em->persist($groom);
            $em->flush();

            $bride->setMarriedWith(null);
            $em->persist($bride);
            $em->flush();

            return $this->redirect($this->generateUrl("matrimoni-index"));
        }
    }

    protected function canMarry(){
        if (false === $this->getPermission()->canMarry()){
            throw new AccessDeniedHttpException();
        }
    }

}
