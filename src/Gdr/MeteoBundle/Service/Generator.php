<?php

namespace Gdr\MeteoBundle\Service;

use Gdr\GameBundle\Entity\Chat;
use Gdr\GameBundle\General;
use Gdr\MeteoBundle\Entity\MeteoCombination;
use Gdr\MeteoBundle\Entity\MeteoMonth;
use Gdr\MeteoBundle\Entity\MeteoStatus;
use Gdr\MeteoBundle\Entity\MoonStatus;
use JMS\DiExtraBundle\Annotation as DI;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class Generator
 *
 * @package Gdr\MeteoBundle\Service
 * @DI\Service("gdr.meteo.generator", public=true)
 */
class Generator
{
    /**
     * \Doctrine\Bundle\DoctrineBundle\Registry
     */
    private $doctrine;

    /**
     * @var \Gdr\GameBundle\General
     */
    private $general;

    /**
     * @DI\InjectParams({
     *     "em" = @DI\Inject("doctrine"),
     *     "general" = @DI\Inject("gdr.game_bundle.general")
     * })
     */
    public function __construct($doctrine, General $general)
    {
        $this->doctrine = $doctrine;
        $this->general = $general;
    }

    /**
     * @return \Doctrine\Bundle\DoctrineBundle\Registry
     */
    protected function getDoctrine()
    {
        return $this->doctrine;
    }

    /**
     * @return \Gdr\GameBundle\General
     */
    protected function getGeneral()
    {
        return $this->general;
    }

    protected function chooseWind()
    {
        $wind = $this->getDoctrine()->getRepository("GdrMeteoBundle:MeteoWind")->findRandomWind();

        return $wind;
    }

    /**
     * @param MeteoMonth $month
     *
     * @return int
     */
    protected function chooseTemperature(MeteoMonth $month)
    {
        $value = rand($month->getTempMin(), $month->getTempMax());

        return $value;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $combinations
     *
     * @return MeteoCombination
     */
    protected function chooseCombination($combinations)
    {
        $weight = 0;
        $combinations = $combinations->toArray();
        shuffle($combinations);

        foreach ($combinations as $combination):
            $weight += $combination->getPercentage();
        endforeach;

        $limit = rand(0, $weight);

        $actual_weight = 0;
        foreach ($combinations as $combination):
            $actual_weight += $combination->getPercentage();
            if ($actual_weight >= $limit) {
                return $combination;
            }
        endforeach;

        return array_pop($combinations);
    }

    public function generateMoon()
    {
        $em = $this->getDoctrine()->getManager();

        $rep_status = $this->getDoctrine()->getRepository("GdrMeteoBundle:MoonStatus");
        $status = $rep_status->findOneBy(array());

        if ($status instanceof \Gdr\MeteoBundle\Entity\MoonStatus) {
            if ($status->isExpired()) {
                $actual_moon = $status->getMoon();
                $rep_moon = $this->getDoctrine()->getRepository("GdrMeteoBundle:Moon");

                $new_moon = $rep_moon->findNewMoonBySort($actual_moon->getSort());

                $expire = new \DateTime("+ " . $new_moon->getDuration() . " days 5am");

                $status->setMoon($new_moon);
                $status->setExpiresAt($expire);
                $em->persist($status);
                $em->flush();

                if ($new_moon->getChangeWolf()){
                    // Recupero tutti i mannari.
                    $mannari = $this->getDoctrine()->getRepository("GdrUserBundle:Personage")
                        ->getMannari();
                    $msg = "<p>Ti informiamo che da oggi e per tre giorni, vista la Luna Piena, il tuo personaggio sarà tramutato automaticamente in Lupo.</p>";
                    foreach($mannari as $m){
                        $this->getGeneral()->createSystemLetter($msg, $m->getId(), "Gestione");
                    }
                }
            }
        }

        return $status;
    }

    public function generateMeteo(MeteoStatus $status)
    {
        $em = $this->getDoctrine()->getManager();

        $rep_month = $this->getDoctrine()->getRepository("GdrMeteoBundle:MeteoMonth");

        $dt = new \DateTime();
        $month_index = $dt->format("n");

        $hours = rand(2, 14);

        $date = $dt->modify("+" . $hours . " hours");

        $month_db = $rep_month->findOneBy(
            array(
                "monthIndex" => $month_index
            )
        );

        if (!$month_db instanceof \Gdr\MeteoBundle\Entity\MeteoMonth) {
            throw new Exception("Mese non trovato nel DB");
        }

        $season_db = $month_db->getSeason();

        if (!$season_db instanceof \Gdr\MeteoBundle\Entity\MeteoSeason) {
            throw new Exception("Stagione non trovata nel DB");
        }

        $combinations = $season_db->getCombinations();
        $combination = $this->chooseCombination($combinations);
        if ($combinations->count() == 0) {
            throw new Exception("Non ci sono combinazioni disponibili.");
        }

        $temperature = $this->chooseTemperature($month_db);
        $wind = $this->chooseWind();

        $old_status_condition_id = $status->getCondition()->getId();

        $status->setExpiresAt($date);
        $status->setWind($wind);
        $status->setCondition($combination->getCondition());
        $status->setTemp($temperature);

        $em->persist($status);
        $em->flush();

        $meteo_message = $this->getDoctrine()->getRepository("GdrMeteoBundle:MeteoMessage")
            ->findOneBy(
                array(
                    "start" => $old_status_condition_id,
                    "end" => $combination->getCondition()->getId()
                )
            );

        if (null !== $meteo_message) {
            $locations = $this->getDoctrine()->getRepository('GdrGameBundle:Location')
                ->getChatLocationForMeteo();

            // Faccio qualcosa se se ci sono chat attive.
            if (null !== $locations) {
                foreach ($locations as $location) {
                    $meteo_chat = new Chat();
                    $meteo_chat->setLocation($location);
                    $meteo_chat->setBody($meteo_message->getMessage());
                    $meteo_chat->setSpecial("meteo");
                    $meteo_chat->setType(5);
                    $em->persist($meteo_chat);
                }
                $em->flush();
            }
        }

        return $status;
    }
}