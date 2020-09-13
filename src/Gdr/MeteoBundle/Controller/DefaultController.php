<?php

namespace Gdr\MeteoBundle\Controller;

use Gdr\MeteoBundle\Entity\MeteoStatus;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function renderMoonAction()
    {
        $rep_status = $this->getDoctrine()->getRepository("GdrMeteoBundle:MoonStatus");
        $moon = $rep_status->findOneBy(array())->getMoon();

        // Metto in sessione la luna (verrà usata per la chat)
        $this->getRequest()->getSession()->set("moon-change-wolf", $moon->getChangeWolf());

        return $this->render(
            '@GdrMeteo/Default/moon.html.twig',
            array(
                'moon' => $moon
            )
        );
    }

    public function renderConditionAction()
    {
        $status = $this->getDoctrine()->getRepository("GdrMeteoBundle:MeteoStatus")
            ->findOneBy(array());

        $hour = date("H", time());

        return $this->render(
            '@GdrMeteo/Default/meteo.html.twig',
            array(
                'meteo' => $status,
                'isDay' => $hour >= 6 && $hour <= 19
            )
        );
    }

    public function renderDateAction()
    {
        $yearNumber = date("Y") - 1664;
        $year = "Anno " . $yearNumber  . "° ";
        $mese = "Mese " .date("n") . "° ";
        $giorno = "Giorno " .date("j") . "°";
        $date = $year . $mese . $giorno;

        return new Response($date);
    }
}
