<?php

namespace Gdr\ItemsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Inventory
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gdr\ItemsBundle\Entity\InventoryRepository")
 */
class Inventory
{
    /**
     * Peso/Ingombro massimo trasportabile.
     */
    const BAG_LIMIT = 30;

    const MUTANDE = 'In Mutande';

    const INVENTORY_BLOCKED_MINUTES = 20;

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
     * @ORM\JoinColumn(onDelete="cascade")
     */
    private $personage;

    /**
     * @ORM\ManyToOne(targetEntity="Item", cascade={"persist"}, fetch="EAGER")
     * @ORM\JoinColumn(onDelete="cascade")
     */
    private $item;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isEquipped", type="boolean")
     */
    private $isEquipped = false;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="expireAt", type="datetime", nullable=true)
     */
    private $expireAt;

    /**
     * @var bool
     *
     * @ORM\Column(name="isInvisible", type="boolean")
     */
    private $isInvisible = false;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isDressed", type="boolean")
     */
    private $isDressed = false;


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
     * Set isEquipped
     *
     * @param boolean $isEquipped
     * @return Inventory
     */
    public function setIsEquipped($isEquipped)
    {
        $this->isEquipped = $isEquipped;
    
        return $this;
    }

    /**
     * Get isEquipped
     *
     * @return boolean 
     */
    public function getIsEquipped()
    {
        return $this->isEquipped;
    }

    /**
     * Set item
     *
     * @param \Gdr\ItemsBundle\Entity\Item $item
     * @return Inventory
     */
    public function setItem(\Gdr\ItemsBundle\Entity\Item $item = null)
    {
        $this->item = $item;
    
        return $this;
    }

    /**
     * Get item
     *
     * @return \Gdr\ItemsBundle\Entity\Item 
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * Set personage
     *
     * @param \Gdr\UserBundle\Entity\Personage $personage
     * @return Inventory
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
     * Set expireAt
     *
     * @param \DateTime $expireAt
     * @return Inventory
     */
    public function setExpireAt($expireAt)
    {
        $this->expireAt = $expireAt;
    
        return $this;
    }

    /**
     * Get expireAt
     *
     * @return \DateTime 
     */
    public function getExpireAt()
    {
        return $this->expireAt;
    }

    /**
     * Set isInvisible
     *
     * @param boolean $isInvisible
     * @return Inventory
     */
    public function setIsInvisible($isInvisible)
    {
        $this->isInvisible = $isInvisible;
    
        return $this;
    }

    /**
     * Get isInvisible
     *
     * @return boolean 
     */
    public function getIsInvisible()
    {
        return $this->isInvisible;
    }

    /**
     * Set isDressed
     *
     * @param boolean $isDressed
     * @return Inventory
     */
    public function setIsDressed($isDressed)
    {
        $this->isDressed = $isDressed;
    
        return $this;
    }

    /**
     * Get isDressed
     *
     * @return boolean 
     */
    public function getIsDressed()
    {
        return $this->isDressed;
    }
}