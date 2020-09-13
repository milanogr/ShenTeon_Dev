<?php

namespace Gdr\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Online
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gdr\UserBundle\Entity\OnlineRepository")
 */
class Online
{
    const STATUS_DISPONIBILE = 1;
    const STATUS_GIOCANDO = 2;
    const STATUS_OCCUPATO = 3;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;

    /**
     * @var \DateTime
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="lastActivity", type="datetime")
     */
    private $lastActivity;


    /**
     * @ORM\OneToOne(targetEntity="Personage", inversedBy="online")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $personage;

    /**
     * @ORM\ManyToOne(targetEntity="Gdr\GameBundle\Entity\Location")
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    private $location;

    /**
     * @var bool
     * @ORM\Column(name="isInGame", type="boolean")
     */
    private $isInGame = false;

    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="inGameEntered", type="datetime", nullable=true)
     */
    private $inGameEntered;

    /**
     * Indica l'ora fino a quando l'invenario del pg sarà bloccato.
     *
     * @ORM\Column(name="inventoryBlockedUntil", type="datetime", nullable=true)
     */
    private $inventoryBlockedUntil;

    /**
     * Al logout si setta su false.
     *
     * @ORM\Column(name="isActive", type="boolean")
     */
    private $isActive = false;

    /**
     * @ORM\Column(type="integer")
     */
    private $status = self::STATUS_DISPONIBILE;

    /**
     * @var bool
     * @ORM\Column(type="boolean")
     */
    private $isInvisible = false;


    public function __toString()
    {
        return (string) 'OnlineUserToString';
    }

    public static function getAllStatus(){
        return array(
            self::STATUS_DISPONIBILE => "Disponibile",
            self::STATUS_GIOCANDO => "Sto giocando",
            self::STATUS_OCCUPATO => "Occupato"
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
     * Constructor
     */
    public function __construct()
    {

    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Online
     */
    public function setCreated($created)
    {
        $this->created = $created;
    
        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set lastActivity
     *
     * @param \DateTime $lastActivity
     * @return Online
     */
    public function setLastActivity($lastActivity)
    {
        $this->lastActivity = $lastActivity;
    
        return $this;
    }

    /**
     * Get lastActivity
     *
     * @return \DateTime 
     */
    public function getLastActivity()
    {
        return $this->lastActivity;
    }

    /**
     * Set personage
     *
     * @param \Gdr\UserBundle\Entity\Personage $personage
     * @return Online
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
     * Set location
     *
     * @param \Gdr\GameBundle\Entity\Location $location
     * @return Online
     */
    public function setLocation(\Gdr\GameBundle\Entity\Location $location = null)
    {
        $this->location = $location;
    
        return $this;
    }

    /**
     * Get location
     *
     * @return \Gdr\GameBundle\Entity\Location 
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @return boolean
     */
    public function getIsInGame()
    {
        return $this->isInGame;
    }

    /**
     * @param boolean $isInGame
     */
    public function setIsInGame($isInGame)
    {
        $this->isInGame = $isInGame;
    }

    /**
     * Set inGameEntered
     *
     * @param \DateTime $inGameEntered
     * @return Online
     */
    public function setInGameEntered($inGameEntered)
    {
        $this->inGameEntered = $inGameEntered;
    
        return $this;
    }

    /**
     * Get inGameEntered
     *
     * @return \DateTime 
     */
    public function getInGameEntered()
    {
        return $this->inGameEntered;
    }

    /**
     * @return mixed
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * @param mixed $isActive
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param string $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    /**
     * Set inventoryBlockedUntil
     *
     * @param \DateTime $inventoryBlockedUntil
     * @return Online
     */
    public function setInventoryBlockedUntil($inventoryBlockedUntil)
    {
        $this->inventoryBlockedUntil = $inventoryBlockedUntil;
    
        return $this;
    }

    /**
     * Get inventoryBlockedUntil
     *
     * @return \DateTime 
     */
    public function getInventoryBlockedUntil()
    {
        return $this->inventoryBlockedUntil;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return boolean
     */
    public function getIsInvisible()
    {
        return $this->isInvisible;
    }

    /**
     * @param boolean $isInvisible
     */
    public function setIsInvisible($isInvisible)
    {
        $this->isInvisible = $isInvisible;
    }
}