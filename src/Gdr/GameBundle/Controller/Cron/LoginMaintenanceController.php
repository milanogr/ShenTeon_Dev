<?php

namespace Gdr\GameBundle\Controller\Cron;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Gdr\UserBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class LoginMaintenanceController extends Controller
{

    /**
     *
     * @Route("/maintenance/archive/clean", name="cron-clean-archive")
     * @return Response
     */
    public function cleanArchiveAction()
    {
        $results =  $this->getDoctrine()->getRepository('GdrGameBundle:LoginArchive')
            ->cleanOldest();

        $this->get('gdr.logs.cron')->log("cleanArchive({$results})", "LoginArchive");

        return new Response("Done {$results}.");
    }

}