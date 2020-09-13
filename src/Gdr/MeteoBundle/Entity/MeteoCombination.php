<?php

namespace Gdr\MeteoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * MeteoCombination
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gdr\MeteoBundle\Entity\MeteoCombinationRepository")
 */
class MeteoCombination
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
     * @ORM\ManyToOne(targetEntity="MeteoSeason", inversedBy="combinations")
     * @ORM\JoinColumn(name="season_id", referencedColumnName="id", nullable=false, onDelete="cascade")
     */
    private $season;

    /**
     * @ORM\ManyToOne(targetEntity="MeteoCondition", inversedBy="combinations")
     * @ORM\JoinColumn(name="condition_id", referencedColumnName="id", nullable=false, onDelete="cascade")
     */
    private $condition;

    /**
     * @var string
     *
     * @ORM\Column(name="percentage", type="integer", length=2)
     */
    private $percentage;


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
     * @return MeteoCombination
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
     * Set percentage
     *
     * @param string $percentage
     * @return MeteoCombination
     */
    public function setPercentage($percentage)
    {
        $this->percentage = $percentage;
    
        return $this;
    }

    /**
     * Get percentage
     *
     * @return string 
     */
    public function getPercentage()
    {
        return $this->percentage;
    }

    /**
     * Set condition
     *
     * @param \Gdr\MeteoBundle\Entity\MeteoCondition $condition
     * @return MeteoCombination
     */
    public function setCondition(\Gdr\MeteoBundle\Entity\MeteoCondition $condition = null)
    {
        $this->condition = $condition;
    
        return $this;
    }

    /**
     * Get condition
     *
     * @return \Gdr\MeteoBundle\Entity\MeteoCondition 
     */
    public function getCondition()
    {
        return $this->condition;
    }

    /**
     * Set season
     *
     * @param \Gdr\MeteoBundle\Entity\MeteoSeason $season
     * @return MeteoCombination
     */
    public function setSeason(\Gdr\MeteoBundle\Entity\MeteoSeason $season)
    {
        $this->season = $season;
    
        return $this;
    }

    /**
     * Get season
     *
     * @return \Gdr\MeteoBundle\Entity\MeteoSeason 
     */
    public function getSeason()
    {
        return $this->season;
    }
}