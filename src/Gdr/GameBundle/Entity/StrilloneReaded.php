<?php

namespace Gdr\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StrilloneReaded
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gdr\GameBundle\Entity\StrilloneReadedRepository")
 */
class StrilloneReaded
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
     * @ORM\ManyToOne(targetEntity="Gdr\UserBundle\Entity\Personage")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $personage;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $lastUpdateStrillone;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $lastUpdateAraldo;

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
     * Set personage
     *
     * @param \Gdr\UserBundle\Entity\Personage $personage
     * @return StrilloneReaded
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
     * @return mixed
     */
    public function getLastUpdateStrillone()
    {
        return $this->lastUpdateStrillone;
    }

    /**
     * @param mixed $lastUpdateStrillone
     */
    public function setLastUpdateStrillone($lastUpdateStrillone)
    {
        $this->lastUpdateStrillone = $lastUpdateStrillone;
    }

    /**
     * @return mixed
     */
    public function getLastUpdateAraldo()
    {
        return $this->lastUpdateAraldo;
    }

    /**
     * @param mixed $lastUpdateAraldo
     */
    public function setLastUpdateAraldo($lastUpdateAraldo)
    {
        $this->lastUpdateAraldo = $lastUpdateAraldo;
    }
}
