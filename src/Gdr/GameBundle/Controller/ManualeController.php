<?php

namespace Gdr\GameBundle\Controller;

use Gdr\UserBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class ManualeController extends Controller
{
    public function indexAction(){

        $manuali = $this->getDoctrine()->getRepository("GdrGameBundle:Manuale")->findSorted();

        return $this->render(
            'GdrGameBundle:Manuale:index.html.twig',
            array(
                "manuali" => $manuali
            )
        );
    }

    public function showAction($id){
        $manuale = $this->getDoctrine()->getRepository("GdrGameBundle:Manuale")->findOneBy(array(
            "id" => $id,
            "active" => true
        ));

        return $this->render(
            'GdrGameBundle:Manuale:show.html.twig',
            array(
                "manuale" => $manuale
            )
        );
    }
}