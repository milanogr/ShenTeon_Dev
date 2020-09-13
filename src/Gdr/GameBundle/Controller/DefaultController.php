<?php

namespace Gdr\GameBundle\Controller;

use Doctrine\ORM\EntityNotFoundException;
use Gdr\GameBundle\Entity\StrilloneReaded;
use Gdr\GameBundle\Form\LocationType;
use Gdr\UserBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * Redirect alla location corrente.
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @throws \Doctrine\ORM\EntityNotFoundException
     */
    public function indexAction()
    {
        $location = $this->getCurrentLocation();

        if (null === $location) {
            // TODO: redirect location default
            throw new EntityNotFoundException('Nessuna locazione trovata');
        }

        $redirect = $this->generateUrl('change_location', array('id' => $location->getId()));

        return $this->redirect($redirect);
    }

    public function locationAction()
    {
        $form = $this->createForm(new LocationType());

        if ($this->getRequest()->isMethod('POST')) {
            $form->handleRequest($this->getRequest());

            if ($form->isValid()) {

                $em = $this->getDoctrine()->getManager();
                $em->persist($form->getData());
                $em->flush();

                return $this->redirect($this->generateUrl('location'));
            }
        }

        return $this->render(
            'GdrGameBundle:Default:location.html.twig',
            array('form' => $form->createView())
        );
    }

    public function renderAudioAction($change = 0)
    {
        if ($change) {
            $pg = $this->getPersonage();
            $pg->setIsSoundActive(!$pg->getIsSoundActive());

            $em = $this->getDoctrine()->getManager();
            $em->persist($pg);
            $em->flush();
        }

        return $this->render(
            '@GdrGame/Default/audio.html.twig',
            array(
                'isAudioActive' => $this->getPersonage()->getIsSoundActive()
            )
        );
    }

    public function renderStrilloneAction()
    {
        $readed = $this->getDoctrine()->getRepository('GdrGameBundle:StrilloneReaded')
            ->findOneBy(array("personage" => $this->getPersonage()));

        if (null === $readed) {
            $readed = new StrilloneReaded();
            $readed->setPersonage($this->getPersonage());
            $readed->setLastUpdateStrillone(new \DateTime("-1 year"));

            $em = $this->getDoctrine()->getManager();
            $em->persist($readed);
            $em->flush();
        } elseif ($readed->getLastUpdateStrillone() === null) {
            $readed->setLastUpdateStrillone(new \DateTime("-1 year"));

            $em = $this->getDoctrine()->getManager();
            $em->persist($readed);
            $em->flush();
        }

        $lastTimeStrillone = $this->getDoctrine()->getRepository('GdrGameBundle:ForumThread')
            ->getLastPostTimeByCategory(18);

        return $this->render(
            "@GdrGame/Default/strillone.html.twig",
            array("isToRead" => $lastTimeStrillone->getLastPostTime() > $readed->getLastUpdateStrillone())
        );
    }

    public function renderAraldoAction()
    {
        $readed = $this->getDoctrine()->getRepository('GdrGameBundle:StrilloneReaded')
            ->findOneBy(array("personage" => $this->getPersonage()));

        if (null === $readed) {
            $readed = new StrilloneReaded();
            $readed->setPersonage($this->getPersonage());
            $readed->setLastUpdateAraldo(new \DateTime("-1 year"));

            $em = $this->getDoctrine()->getManager();
            $em->persist($readed);
            $em->flush();
        } elseif ($readed->getLastUpdateAraldo() === null) {
            $readed->setLastUpdateAraldo(new \DateTime("-1 year"));

            $em = $this->getDoctrine()->getManager();
            $em->persist($readed);
            $em->flush();
        }

        $lastTimeStrillone = $this->getDoctrine()->getRepository('GdrGameBundle:ForumThread')
            ->getLastPostTimeByCategory(19);

        return $this->render(
            "@GdrGame/Default/araldo.html.twig",
            array("isToRead" => $lastTimeStrillone->getLastPostTime() > $readed->getLastUpdateAraldo())
        );
    }

    public function dateAction()
    {
        // 2013 -> 300
        // 2014 -> 301

        $now = new \DateTime();
    }
}
