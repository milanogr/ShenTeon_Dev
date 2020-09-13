<?php

namespace Gdr\GameBundle\Controller;

use Gdr\UserBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class EdittiController extends Controller
{
    public function showAction()
    {
        $editti = $this->getDoctrine()->getRepository("GdrGameBundle:Editto")->findSortedEditti();

        return $this->render(
            'GdrGameBundle:Editti:index.html.twig',
            array(
                "editti" => $editti
            )
        );
    }
}