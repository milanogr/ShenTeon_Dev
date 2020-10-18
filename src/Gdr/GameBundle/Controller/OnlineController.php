<?php

namespace Gdr\GameBundle\Controller;

use Gdr\GameBundle\Form\Type\OnlineStatusType;
use Gdr\UserBundle\Controller\Controller;
use Gdr\UserBundle\Entity\Online;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class OnlineController
 *
 * @package Gdr\GameBundle\Controller
 */
class OnlineController extends Controller
{
    public function indexAction(){

        $onlines = $this->getDoctrine()->getRepository('GdrUserBundle:Online')
            ->getPersonagesOnline();

        $canBeInvisible = $this->getPermission()->canBeInvisible();

        $online = $this->getPersonage()->getOnline();
        $form = $this->createForm(new OnlineStatusType($canBeInvisible), $online);

        $form->handleRequest($this->getRequest());

        if ($form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($online);
            $em->flush();

            $url = $this->generateUrl('online-index');
            return $this->redirect($url);
        }

        return $this->render(
            'GdrGameBundle:Online:index.html.twig',
            array(
                'onlines' => $onlines,
                'form' => $form->createView(),
                'canBeInvisibile' => $canBeInvisible
            )
        );
    }


    // ---------------------------------------

    public function refreshUserAction()
    {
        $user = $this->getUser();

        $refresh = $this->getDoctrine()->getRepository('GdrUserBundle:Online')
            ->findOneByUser($user->getId());

        if ($refresh) {
            $refresh->setUpdated(new \DateTime());
            $em = $this->getDoctrine()->getManager();
            $em->persist($refresh);
            $em->flush();
        }

        return json_encode(array('response' => true));
    }

    public function showLoggedInOutAction()
    {
        $all = $this->getDoctrine()->getRepository('GdrUserBundle:Personage')
            ->getJustLoggedInAndOut();

        $online = $this->getDoctrine()->getRepository('GdrUserBundle:Online')
            ->countPersonageOnline();

        $date = new \DateTime();
        $date->modify('+15 seconds');

        $response = new Response();
        $response->setExpires($date);

        return $this->render(
            'GdrGameBundle:Online:enteredAndLeaved.html.twig',
            array(
                'all' => $all,
                "online" => $online,
                "time" => new \DateTime("-5 minutes")
            )

        );
    }
}