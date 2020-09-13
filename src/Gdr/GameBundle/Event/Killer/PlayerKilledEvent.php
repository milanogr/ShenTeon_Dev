<?php

namespace Gdr\GameBundle\Event\Killer;


use Gdr\UserBundle\Entity\Personage;
use Symfony\Component\EventDispatcher\Event;

class PlayerKilledEvent extends Event {

    /**
     * @var Personage
     */
    private $player;

    public function __construct(Personage $player){

        $this->player = $player;
    }

    /**
     * @return Personage
     */
    public function getPlayer()
    {
        return $this->player;
    }

}