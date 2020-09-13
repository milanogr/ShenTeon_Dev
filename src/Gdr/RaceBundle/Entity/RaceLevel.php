<?php

namespace Gdr\RaceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RaceLevel
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gdr\RaceBundle\Entity\RaceLevelRepository")
 */
class RaceLevel
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
     * @var integer
     *
     * @ORM\Column(name="age_min", type="integer")
     */
    protected $age_min;

    /**
     * @var integer
     *
     * @ORM\Column(name="age_max", type="integer")
     */
    protected $age_max;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    protected $strength = 0;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    protected $wisdom = 0;

    /**
     * @ORM\ManyToOne(targetEntity="Gdr\RaceBundle\Entity\Race")
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    protected $race;

    public function __toString(){
        return $this->getName() ??  '';
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
     * @return RaceLevel
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
     * Set age_min
     *
     * @param integer $ageMin
     * @return RaceLevel
     */
    public function setAgeMin($ageMin)
    {
        $this->age_min = $ageMin;
    
        return $this;
    }

    /**
     * Get age_min
     *
     * @return integer 
     */
    public function getAgeMin()
    {
        return $this->age_min;
    }

    /**
     * Set age_max
     *
     * @param integer $ageMax
     * @return RaceLevel
     */
    public function setAgeMax($ageMax)
    {
        $this->age_max = $ageMax;
    
        return $this;
    }

    /**
     * Get age_max
     *
     * @return integer 
     */
    public function getAgeMax()
    {
        return $this->age_max;
    }

    /**
     * Set strength
     *
     * @param integer $strength
     * @return RaceLevel
     */
    public function setStrength($strength)
    {
        $this->strength = $strength;
    
        return $this;
    }

    /**
     * Get strength
     *
     * @return integer 
     */
    public function getStrength()
    {
        return $this->strength;
    }

    /**
     * Set wisdom
     *
     * @param integer $wisdom
     * @return RaceLevel
     */
    public function setWisdom($wisdom)
    {
        $this->wisdom = $wisdom;
    
        return $this;
    }

    /**
     * Get wisdom
     *
     * @return integer 
     */
    public function getWisdom()
    {
        return $this->wisdom;
    }

    /**
     * Set race
     *
     * @param \Gdr\RaceBundle\Entity\Race $race
     * @return RaceLevel
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