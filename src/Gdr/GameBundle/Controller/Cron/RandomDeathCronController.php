<?php

namespace Gdr\GameBundle\Controller\Cron;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Gdr\UserBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class RandomDeathCronController extends Controller
{

    /**
     *
     * @Route("/player/randomly-killing", name="cron-player-random-death")
     * @return Response
     */
    public function killPlayerAction()
    {
        $killed = $this->get('gdr.game.random_death')->kill();

        $this->get('gdr.logs.cron')->log("Random Death ({$killed})", "RandomDeath");

        return new Response("Done.");
    }

}