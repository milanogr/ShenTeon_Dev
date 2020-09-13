<?php

namespace Gdr\MeteoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * MeteoStatus
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gdr\MeteoBundle\Entity\MeteoStatusRepository")
 * @Vich\Uploadable
 */
class MeteoStatus
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
     * @ORM\ManyToOne(targetEntity="MeteoCondition", inversedBy="status")
     * @ORM\JoinColumn(onDelete="cascade")
     */
    protected $condition;

    /**
     * @ORM\ManyToOne(targetEntity="MeteoWind", inversedBy="status")
     * @ORM\JoinColumn(onDelete="cascade")
     */
    protected $wind;

    /**
     * @var string
     *
     * @ORM\Column(name="temp", type="integer", length=2)
     */
    protected $temp;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_fixed", type="boolean", nullable=true)
     */
    protected $isFixed;

    /**
     * @var
     * @ORM\Column(name="expiresAt", type="datetime")
     */
    protected $expiresAt;

    public function __toString(){
        return (string) "Stato attuale";
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
     * Set temp
     *
     * @param string $temp
     * @return MeteoStatus
     */
    public function setTemp($temp)
    {
        $this->temp = $temp;
    
        return $this;
    }

    /**
     * Get temp
     *
     * @return string 
     */
    public function getTemp()
    {
        return $this->temp;
    }

    /**
     * Set isFixed
     *
     * @param boolean $isFixed
     * @return MeteoStatus
     */
    public function setIsFixed($isFixed)
    {
        $this->isFixed = $isFixed;
    
        return $this;
    }

    /**
     * Get isFixed
     *
     * @return boolean 
     */
    public function getIsFixed()
    {
        return $this->isFixed;
    }

    /**
     * Set condition
     *
     * @param \Gdr\MeteoBundle\Entity\MeteoCondition $condition
     * @return MeteoStatus
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
     * Set wind
     *
     * @param \Gdr\MeteoBundle\Entity\MeteoWind $wind
     * @return MeteoStatus
     */
    public function setWind(\Gdr\MeteoBundle\Entity\MeteoWind $wind = null)
    {
        $this->wind = $wind;
    
        return $this;
    }

    /**
     * Get wind
     *
     * @return \Gdr\MeteoBundle\Entity\MeteoWind 
     */
    public function getWind()
    {
        return $this->wind;
    }

    /**
     * Set expiresAt
     *
     * @param \DateTime $expiresAt
     * @return MeteoStatus
     */
    public function setExpiresAt($expiresAt)
    {
        $this->expiresAt = $expiresAt;
    
        return $this;
    }

    /**
     * Get expiresAt
     *
     * @return \DateTime 
     */
    public function getExpiresAt()
    {
        return $this->expiresAt;
    }

    public function isExpired(){
        if($this->getIsFixed())
            return false;

        if($this->getExpiresAt() <= new \DateTime())
            return true;

        return false;
    }
}