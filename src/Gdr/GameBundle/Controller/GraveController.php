<?php

namespace Gdr\GameBundle\Controller;

use Gdr\UserBundle\Controller\Controller;

/**
 * Class OnlineController
 *
 * @package Gdr\GameBundle\Controller
 */
class GraveController extends Controller{

    public function indexAction() {
        return $this->render("GdrGameBundle:Grave:index.html.twig");
    }

    public function showAction(){
        $rep_grave = $this->getDoctrine()->getRepository("GdrUserBundle:Gravestone");
        $no_family = $rep_grave->findBy(array(
            "inFamilyGrave" => false
        ), array("surname" => "ASC"));

        $page = $this->getRequest()->query->get('page', 1);

        $paginator = $this->get('knp_paginator')->paginate($no_family, $page, 15);



        return $this->render(
            'GdrGameBundle:Grave:show.html.twig',
            array(
                'paginator' => $paginator,
            )
        );
    }

    public function showFamilyAction(){
        $rep_grave = $this->getDoctrine()->getRepository("GdrUserBundle:Gravestone");

        $with_family = $rep_grave->findBy(array(
                "inFamilyGrave" => true
            ),array("surname" => "ASC"));

        $page = $this->getRequest()->query->get('page', 1);

        $paginator = $this->get('knp_paginator')->paginate($with_family, $page, 15);


        return $this->render(
            'GdrGameBundle:Grave:showFamily.html.twig',
            array(
                'paginator' => $paginator,
            )
        );
    }
}