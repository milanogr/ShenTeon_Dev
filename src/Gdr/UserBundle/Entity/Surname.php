<?php

namespace Gdr\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Surname
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Surname
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
     * @var string
     *
     * @ORM\Column(name="value", type="string", length=255)
     */
    protected $value;

    /**
     * @ORM\ManyToOne(targetEntity="Gdr\RaceBundle\Entity\Race")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    protected $race;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isActive", type="boolean")
     */
    protected $isActive = true;

    /**
     * @return string
     */
    public function __toString()
    {
        return (string)$this->getValue();
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
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return Surname
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }


    /**
     * Set race
     *
     * @param \Gdr\RaceBundle\Entity\Race $race
     * @return Surname
     */
    public function setRace(\Gdr\RaceBundle\Entity\Race $race = null)
    {
        $this->race = $race;
    
        return $this;
    }

    /**
     * Get race
     *
     * @return \Gdr\RaceBundle\Entity\Race 
     */
    public function getRace()
    {
        return $this->race;
    }
}