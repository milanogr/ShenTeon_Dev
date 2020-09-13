<?php
/**
 * Created by PhpStorm.
 * User: diego
 * Date: 08/01/15
 * Time: 14:27
 */

namespace Gdr\GameBundle\Event\Trainer;


use Gdr\UserBundle\Entity\Personage;
use Gdr\UserBundle\Entity\Skill;
use Symfony\Component\EventDispatcher\Event;

class SkillRandomlyAssignedEvent extends Event
{

    /**
     * @var Personage
     */
    private $player;
    /**
     * @var Skill
     */
    private $skill;

    public function __construct(Personage $player, Skill $skill){

        $this->player = $player;
        $this->skill = $skill;
    }

    /**
     * @return Personage
     */
    public function getPlayer()
    {
        return $this->player;
    }

    /**
     * @return Skill
     */
    public function getSkill()
    {
        return $this->skill;
    }

}