<?php

namespace Gdr\RaceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EyeColor
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class EyeColor
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    protected $name;

    /**
     * @ORM\ManyToMany(targetEntity="Race", mappedBy="eyeColors")
     **/
    protected $races;

    public function __toString()
    {
        return (string)$this->getName();
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
     * Set name
     *
     * @param string $name
     * @return EyeColor
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->races = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add races
     *
     * @param \Gdr\RaceBundle\Entity\Race $races
     * @return EyeColor
     */
    public function addRace(\Gdr\RaceBundle\Entity\Race $races)
    {
        $this->races[] = $races;
    
        return $this;
    }

    /**
     * Remove races
     *
     * @param \Gdr\RaceBundle\Entity\Race $races
     */
    public function removeRace(\Gdr\RaceBundle\Entity\Race $races)
    {
        $this->races->removeElement($races);
    }

    /**
     * Get races
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRaces()
    {
        return $this->races;
    }
}