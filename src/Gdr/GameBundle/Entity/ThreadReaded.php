<?php

namespace Gdr\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ThreadReaded
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gdr\GameBundle\Entity\ThreadReadedRepository")
 */
class ThreadReaded
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
     * @ORM\ManyToOne(targetEntity="Gdr\UserBundle\Entity\Personage")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $personage;

    /**
     * @ORM\ManyToOne(targetEntity="Gdr\GameBundle\Entity\ForumThread")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $thread;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isReaded", type="boolean")
     */
    private $isReaded;


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
     * Set isReaded
     *
     * @param boolean $isReaded
     * @return ThreadReaded
     */
    public function setIsReaded($isReaded)
    {
        $this->isReaded = $isReaded;
    
        return $this;
    }

    /**
     * Get isReaded
     *
     * @return boolean 
     */
    public function getIsReaded()
    {
        return $this->isReaded;
    }

    /**
     * Set personage
     *
     * @param \Gdr\UserBundle\Entity\Personage $personage
     * @return ThreadReaded
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
     * @return ThreadReaded
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
