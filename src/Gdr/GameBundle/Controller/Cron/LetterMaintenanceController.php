<?php

namespace Gdr\GameBundle\Controller\Cron;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Gdr\UserBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class LetterMaintenanceController extends Controller
{

    /**
     * Cancella le missive già lette ed eliminate che occupano spazio inutile nel db.
     *
     * @Route("/maintenance/letters/clean-readed", name="cron-clean-letters-readed")
     * @return Response
     */
    public function cleanReaded()
    {
        $before = new \DateTime("- 4 month");

        $deleted = $this->get('gdr.letter')->removeReadedBefore($before);

        $this->get('gdr.logs.cron')->log("Rimosse {$deleted} missive lette ed eliminate.", "Missive");

        return new Response("Done.");
    }

    /**
     * Cancella le missive non lette in un periodo inferiore di x mesi. (pg che non loggano più...)
     *
     * @Route("/maintenance/letters/clean-not-readed", name="cron-clean-letters-not-readed")
     * @return Response
     */
    public function cleanNotReaded()
    {
        $before = new \DateTime("- 8 month");

        $notReadedBefore = $this->get('gdr.letter')->removeNotReadedBefore($before);
        $specialOldest = $this->get('gdr.letter')->removeSpecialOldest($before);

        $this->get('gdr.logs.cron')->log("removeNotReadedBefore ({$notReadedBefore}), removeSpecialOldest({$specialOldest})", "Missive");

        return new Response("Done.");
    }

}