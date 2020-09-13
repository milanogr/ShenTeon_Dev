<?php

namespace Gdr\GameBundle\Controller\Cron;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Gdr\UserBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class ChatMaintenanceController extends Controller
{

    /**
     *
     * @Route("/maintenance/clean-chat", name="cron-clean-chat")
     * @return Response
     */
    public function cleanChatAction()
    {
        $results =  $this->getDoctrine()->getRepository('GdrGameBundle:Chat')
            ->cleanOldest();

        $this->get('gdr.logs.cron')->log("Rimossi {$results} messaggi di chat.", "Chat");

        return new Response("Done {$results}.");
    }

}