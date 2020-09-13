<?php

namespace Gdr\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gdr\GameBundle\Validator\Constraint as GameAssert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Esilio
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gdr\UserBundle\Entity\EsilioRepository")
 */
class Esilio
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
     * @var string
     *
     * @ORM\Column(name="reason", type="text")
     * @Assert\NotBlank()
     */
    private $reason;

    /**
     * @var integer
     *
     * @ORM\Column(name="days", type="integer")
     * @Assert\NotBlank()
     */
    private $days;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="until", type="datetime", nullable=true)
     */
    private $until;

    /**
     * @ORM\ManyToOne(targetEntity="Gdr\UserBundle\Entity\Personage")
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    private $moderator;

    /**
     * @ORM\ManyToOne(targetEntity="Gdr\UserBundle\Entity\User")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $banned;

    /**
     * @Assert\NotBlank()
     * @GameAssert\NotBanned()
     */
    private $personage;

    /**
     * @var datetime
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    public function __toString(){
        return (string) $this->getBanned() ? $this->getBanned()->getEmail() :  '';
    }

    public static function getDaysChoice(){
        return array(
            1 => "1 giorno",
            3 => "3 giorni",
            7 => "7 giorni",
            10 => "10 giorni",
            15 => "15 giorni",
            30 => "30 giorni",
            60 => "60 giorni",
            9999 => "Per sempre"
        );
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
     * Set reason
     *
     * @param string $reason
     * @return Esilio
     */
    public function setReason($reason)
    {
        $this->reason = $reason;
    
        return $this;
    }

    /**
     * Get reason
     *
     * @return string 
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * Set days
     *
     * @param integer $days
     * @return Esilio
     */
    public function setDays($days)
    {
        $this->days = $days;
    
        return $this;
    }

    /**
     * Get days
     *
     * @return integer 
     */
    public function getDays()
    {
        return $this->days;
    }

    /**
     * Set until
     *
     * @param \DateTime $until
     * @return Esilio
     */
    public function setUntil($until)
    {
        $this->until = $until;
    
        return $this;
    }

    /**
     * Get until
     *
     * @return \DateTime 
     */
    public function getUntil()
    {
        return $this->until;
    }

    /**
     * Set moderator
     *
     * @param \Gdr\UserBundle\Entity\Personage $moderator
     * @return Esilio
     */
    public function setModerator(\Gdr\UserBundle\Entity\Personage $moderator = null)
    {
        $this->moderator = $moderator;
    
        return $this;
    }

    /**
     * Get moderator
     *
     * @return \Gdr\UserBundle\Entity\Personage 
     */
    public function getModerator()
    {
        return $this->moderator;
    }

    /**
     * @return \Gdr\UserBundle\Entity\datetime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \Gdr\UserBundle\Entity\datetime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Set banned
     *
     * @param \Gdr\UserBundle\Entity\User $banned
     * @return Esilio
     */
    public function setBanned(\Gdr\UserBundle\Entity\User $banned = null)
    {
        $this->banned = $banned;
    
        return $this;
    }

    /**
     * Get banned
     *
     * @return \Gdr\UserBundle\Entity\User
     */
    public function getBanned()
    {
        return $this->banned;
    }

    /**
     * @return mixed
     */
    public function getPersonage()
    {
        return $this->personage;
    }

    /**
     * @param mixed $personage
     */
    public function setPersonage($personage)
    {
        $this->personage = $personage;
    }
}