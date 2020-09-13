<?php

namespace Gdr\GameBundle\Service\Personage\Killer;

use Doctrine\ORM\EntityManager;
use Gdr\UserBundle\Entity\Personage;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

interface KillerInterface {

    public function __construct(EntityManager $entityManager, EventDispatcherInterface $eventDispatcher);

    public function kill(Personage $player);

}