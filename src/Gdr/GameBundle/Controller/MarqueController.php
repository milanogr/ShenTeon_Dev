<?php

namespace Gdr\GameBundle\Controller;


use Gdr\UserBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class MarqueController extends Controller
{
    public function getMarquesAction()
    {
        $marques = $this->getDoctrine()->getRepository('GdrGameBundle:Marque')
            ->getAllMarques();

        $response = new Response();
        $response->setExpires(new \DateTime("+2 minutes"));

        return $this->render(
            '@GdrGame/Marque/list.html.twig',
            array(
                'marques' => $marques
            ),
            $response
        );
    }
}