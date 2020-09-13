<?php

namespace Gdr\MeteoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MeteoMonth
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gdr\MeteoBundle\Entity\MeteoMonthRepository")
 */
class MeteoMonth
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
     * @var string
     *
     * @ORM\Column(name="temp_min", type="integer", length=2)
     */
    private $tempMin;

    /**
     * @var string
     *
     * @ORM\Column(name="temp_max", type="integer", length=2)
     */
    private $tempMax;

    /**
     * @var integer
     *
     * @ORM\Column(name="monthIndex", type="integer", length=2)
     */
    private $monthIndex;

    /**
     * @ORM\ManyToOne(targetEntity="MeteoSeason", inversedBy="months", cascade={"all"})
     * @ORM\JoinColumn(name="season_id", referencedColumnName="id", nullable=true, onDelete="cascade")
     */
    private $season;


    public function __toString(){
        return $this->getName()  ??  '';
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
     * @return MeteoMonth
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
     * Set tempMin
     *
     * @param string $tempMin
     * @return MeteoMonth
     */
    public function setTempMin($tempMin)
    {
        $this->tempMin = $tempMin;

        return $this;
    }

    /**
     * Get tempMin
     *
     * @return string
     */
    public function getTempMin()
    {
        return $this->tempMin;
    }

    /**
     * Set tempMax
     *
     * @param string $tempMax
     * @return MeteoMonth
     */
    public function setTempMax($tempMax)
    {
        $this->tempMax = $tempMax;

        return $this;
    }

    /**
     * Get tempMax
     *
     * @return string
     */
    public function getTempMax()
    {
        return $this->tempMax;
    }

    /**
     * Set monthIndex
     *
     * @param integer $monthIndex
     * @return MeteoMonth
     */
    public function setMonthIndex($monthIndex)
    {
        $this->monthIndex = $monthIndex;

        return $this;
    }

    /**
     * Get monthIndex
     *
     * @return integer
     */
    public function getMonthIndex()
    {
        return $this->monthIndex;
    }


    /**
     * Set season
     *
     * @param \Gdr\MeteoBundle\Entity\MeteoSeason $season
     * @return MeteoMonth
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