<?php

namespace Gdr\GameBundle\Service\Personage;

use Doctrine\ORM\EntityManager;
use Gdr\GameBundle\Service\Personage\Killer\KillerInterface;
use Gdr\GameBundle\Service\ChanceGenerator;

class RandomDeath
{

    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * @var KillerInterface
     */
    private $killer;

    /**
     * @var ChanceGenerator
     */
    private $chanceGenerator;


    /**
     * @param EntityManager $entityManager
     * @param KillerInterface $killer
     * @param ChanceGenerator $chanceGenerator
     */
    public function __construct(EntityManager $entityManager, KillerInterface $killer, ChanceGenerator $chanceGenerator)
    {
        $this->entityManager = $entityManager;
        $this->killer = $killer;
        $this->chanceGenerator = $chanceGenerator;
    }

    /**
     * Randomly kill a player.
     */
    public function kill()
    {
        if (!$this->chanceGenerator->generate(30)) {
            return false;
        }

        $minTime = new \DateTime('- 2 week');

        $players = $this->entityManager
            ->getRepository('GdrUserBundle:Personage')
            ->getKillableRandomly($minTime);

        if (!count($players)) {
            return false;
        }

        $playerToKillIndex = array_rand($players, 1);
        $playerToKill = $players[$playerToKillIndex];

        $playerToKill = $this->entityManager
            ->getRepository('GdrUserBundle:Personage')
            ->find($playerToKill);

        if ($playerToKill !== null){
            $this->killer->kill($playerToKill);
            return true;
        }
    }

}