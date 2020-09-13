<?php

namespace Gdr\MeteoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MoonStatus
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gdr\MeteoBundle\Entity\MoonStatusRepository")
 */
class MoonStatus
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected  $id;

    /**
     * @ORM\ManyToOne(targetEntity="Moon", inversedBy="status")
     * @ORM\JoinColumn(onDelete="cascade")
     */
    protected $moon;

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
     * Set expiresAt
     *
     * @param \DateTime $expiresAt
     * @return MoonStatus
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

    /**
     * Set moon
     *
     * @param \Gdr\MeteoBundle\Entity\Moon $moon
     * @return MoonStatus
     */
    public function setMoon(\Gdr\MeteoBundle\Entity\Moon $moon = null)
    {
        $this->moon = $moon;
    
        return $this;
    }

    /**
     * Get moon
     *
     * @return \Gdr\MeteoBundle\Entity\Moon 
     */
    public function getMoon()
    {
        return $this->moon;
    }

    public function isExpired(){
        if($this->getExpiresAt() < new \DateTime())
            return true;

        return false;
    }
}