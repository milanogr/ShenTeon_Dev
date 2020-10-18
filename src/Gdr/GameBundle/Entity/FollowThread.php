<?php

namespace Gdr\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FollowThread
 *
 * @ORM\Table()Game
 * @ORM\Entity(repositoryClass="Gdr\GameBundle\Entity\FollowThreadRepository")
 */
class FollowThread
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Gdr\UserBundle\Entity\Personage", cascade={"persist"})
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $personage;

    /**
     * @ORM\ManyToOne(targetEntity="Gdr\GameBundle\Entity\ForumThread", cascade={"persist"})
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $thread;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isNotified = false;


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
     * Set isNotified
     *
     * @param boolean $isNotified
     * @return FollowThread
     */
    public function setIsNotified($isNotified)
    {
        $this->isNotified = $isNotified;

        return $this;
    }

    /**
     * Get isNotified
     *
     * @return boolean 
     */
    public function getIsNotified()
    {
        return $this->isNotified;
    }

    /**
     * Set personage
     *
     * @param \Gdr\UserBundle\Entity\Personage $personage
     * @return FollowThread
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

    /**
     * Set thread
     *
     * @param \Gdr\GameBundle\Entity\ForumThread $thread
     * @return FollowThread
     */
    public function setThread(\Gdr\GameBundle\Entity\ForumThread $thread = null)
    {
        $this->thread = $thread;

        return $this;
    }

    /**
     * Get thread
     *
     * @return \Gdr\GameBundle\Entity\ForumThread 
     */
    public function getThread()
    {
        return $this->thread;
    }
}
