<?php

namespace Gdr\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SkillLearned
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gdr\UserBundle\Entity\SkillLearnedRepository")
 */
class SkillLearned
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Skill")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    protected $skill;

    /**
     * @ORM\ManyToOne(targetEntity="Personage")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    protected $personage;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $canUseAt;

    public function __construct()
    {
        if (null === $this->canUseAt){
            $this->canUseAt = new \DateTime();
        }
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set canUseAt
     *
     * @param \DateTime $canUseAt
     *
     * @return SkillLearned
     */
    public function setCanUseAt($canUseAt)
    {
        $this->canUseAt = $canUseAt;

        return $this;
    }

    /**
     * Get canUseAt
     *
     * @return \DateTime
     */
    public function getCanUseAt()
    {
        return $this->canUseAt;
    }

    /**
     * Set skill
     *
     * @param \Gdr\UserBundle\Entity\Skill $skill
     *
     * @return SkillLearned
     */
    public function setSkill(\Gdr\UserBundle\Entity\Skill $skill = null)
    {
        $this->skill = $skill;

        return $this;
    }

    /**
     * Get skill
     *
     * @return \Gdr\UserBundle\Entity\Skill
     */
    public function getSkill()
    {
        return $this->skill;
    }

    /**
     * Set personage
     *
     * @param \Gdr\UserBundle\Entity\Personage $personage
     *
     * @return SkillLearned
     */
    public function setPersonage(\Gdr\UserBundle\Entity\Personage $personage = null)
    {
        $this->personage = $personage;

        return $this;
    }

    /**
     * Get personage
     *
     * @return \Gdr\UserBundle\Entity\Personage
     */
    public function getPersonage()
    {
        return $this->personage;
    }
}