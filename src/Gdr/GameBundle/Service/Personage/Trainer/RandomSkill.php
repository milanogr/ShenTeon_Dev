<?php

namespace Gdr\GameBundle\Service\Personage\Trainer;


use Doctrine\ORM\EntityManager;
use Gdr\GameBundle\Event\Trainer\SkillRandomlyAssignedEvent;
use Gdr\RaceBundle\Entity\Race;
use Gdr\UserBundle\Entity\Personage;
use Gdr\UserBundle\Entity\SkillLearned;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class RandomSkill
{

    /**
     * @var EntityManager
     */
    private $manager;
    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    public function __construct(EntityManager $manager, EventDispatcherInterface $eventDispatcher)
    {
        $this->manager = $manager;
        $this->eventDispatcher = $eventDispatcher;
    }


    public function assign(Personage $player, $level, $flush = true)
    {
        if (!$this->canLearn($player, $level)) {
            return false;
        }

        $randomSkill = $this->generateRandomSkill($level);

        $learnSkill = new SkillLearned();
        $learnSkill->setPersonage($player);
        $learnSkill->setSkill($randomSkill);

        $this->manager->persist($learnSkill);

        if ($flush) {
            $this->manager->flush();
        }

        return $player;
    }

    public function canLearn(Personage $player, $level)
    {
        return $this->manager
            ->getRepository('GdrUserBundle:Skill')
            ->canLearnRandomSkill($player, $level);
    }

    public function getPriceByLevel($level)
    {
        if ($level == 1) return 500;

        return $level * 1000 - 1000;
    }

    private function generateRandomSkill($level)
    {
        $skills = $this->manager
            ->getRepository('GdrUserBundle:Skill')
            ->getRandomSkills($level);

        $total = count($skills) - 1;
        $randomKey = mt_rand(0, $total);

        return $skills[$randomKey];
    }
}