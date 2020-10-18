<?php

namespace Gdr\GameBundle\Service\Personage\Killer;

use Doctrine\ORM\EntityManager;
use Gdr\UserBundle\Entity\Personage;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class Killer implements KillerInterface
{
    /**
     * @var EntityManager
     */
    private $entityManager;
    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * @param EntityManager $entityManager
     * @param EventDispatcherInterface $eventDispatcher
     */
    public function __construct(EntityManager $entityManager, EventDispatcherInterface $eventDispatcher)
    {
        $this->entityManager = $entityManager;
        $this->eventDispatcher = $eventDispatcher;
    }

    public function kill(Personage $player)
    {
//        $player->setDeadAt(new \DateTime());
//        $player->setIsDead(true);
//        $player->setIsSpecialDeath(true);
//
//        $this->entityManager->persist($player);
//        $this->entityManager->flush();

        dump('player killed.');

        $this->eventDispatcher->dispatch('player.killed.randomly');
    }

}