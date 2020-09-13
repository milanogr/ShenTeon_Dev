<?php

namespace Gdr\MeteoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MeteoSeason
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gdr\MeteoBundle\Entity\MeteoSeasonRepository")
 */
class MeteoSeason
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     *
     * @ORM\OneToMany(targetEntity="MeteoCombination", mappedBy="season", cascade={"all"})
     */
    private $combinations;

    /**
     *
     * @ORM\OneToMany(targetEntity="MeteoMonth", mappedBy="season", cascade={"all"})
     */
    private $months;

    public function __toString(){
        return $this->getName() ??  '' ;
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
     * @return MeteoSeason
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
        $this->combinations = new \Doctrine\Common\Collections\ArrayCollection();
        $this->months = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add combinations
     *
     * @param \Gdr\MeteoBundle\Entity\MeteoCombination $combinations
     * @return MeteoSeason
     */
    public function addCombination(\Gdr\MeteoBundle\Entity\MeteoCombination $combinations)
    {
        $this->combinations[] = $combinations;
    
        return $this;
    }

    /**
     * Remove combinations
     *
     * @param \Gdr\MeteoBundle\Entity\MeteoCombination $combinations
     */
    public function removeCombination(\Gdr\MeteoBundle\Entity\MeteoCombination $combinations)
    {
        $this->combinations->removeElement($combinations);
    }

    /**
     * Get combinations
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCombinations()
    {
        return $this->combinations;
    }

    /**
     * Add months
     *
     * @param \Gdr\MeteoBundle\Entity\MeteoMonth $months
     * @return MeteoSeason
     */
    public function addMonth(\Gdr\MeteoBundle\Entity\MeteoMonth $months)
    {
        $this->months[] = $months;
    
        return $this;
    }

    /**
     * Remove months
     *
     * @param \Gdr\MeteoBundle\Entity\MeteoMonth $months
     */
    public function removeMonth(\Gdr\MeteoBundle\Entity\MeteoMonth $months)
    {
        $this->months->removeElement($months);
    }

    /**
     * Get months
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMonths()
    {
        return $this->months;
    }
}