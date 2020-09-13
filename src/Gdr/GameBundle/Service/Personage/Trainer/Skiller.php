<?php
/**
 * Created by PhpStorm.
 * User: diego
 * Date: 09/01/15
 * Time: 11:40
 */

namespace Gdr\GameBundle\Service\Personage\Trainer;


use Doctrine\ORM\EntityManager;
use Gdr\UserBundle\Entity\Personage;
use Gdr\UserBundle\Entity\Skill;
use Gdr\UserBundle\Entity\SkillLearned;

class Skiller
{

    /**
     * @var EntityManager
     */
    private $manager;

    /**
     * @param EntityManager $manager
     */
    public function __construct(EntityManager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * @param Personage $player
     * @param Skill $skill
     */
    public function learn(Personage $player, Skill $skill)
    {
        $learnSkill = new SkillLearned();
        $learnSkill->setPersonage($player);
        $learnSkill->setSkill($skill);
        $this->manager->persist($learnSkill);
        $this->manager->flush();
    }

    /**
     * @param Personage $player
     * @param $level
     * @return bool
     */
    public function canLearn(Personage $player, $level)
    {
        return $this->manager
            ->getRepository('GdrUserBundle:Skill')
            ->canLearnOnLevel($player, $level);
    }

}