<?php

namespace Gdr\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PersonageType
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class PersonageType
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
     * @var integer
     *
     * @ORM\Column(type="boolean")
     */
    private $isGestore = false;

    /**
     * @var integer
     *
     * @ORM\Column(type="boolean")
     */
    private $isModeratore = false;

    /**
     * @var integer
     *
     * @ORM\Column(type="boolean")
     */
    private $isGuida = false;

    /**
     * @ORM\ManyToOne(targetEntity="Personage")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $personage;


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
     * @return PersonageType
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
     * @return int
     */
    public function getIsGuida()
    {
        return $this->isGuida;
    }

    /**
     * @param int $isGuida
     */
    public function setIsGuida($isGuida)
    {
        $this->isGuida = $isGuida;
    }

    /**
     * @return int
     */
    public function getIsModeratore()
    {
        return $this->isModeratore;
    }

    /**
     * @param int $isModeratore
     */
    public function setIsModeratore($isModeratore)
    {
        $this->isModeratore = $isModeratore;
    }

    /**
     * @return int
     */
    public function getIsGestore()
    {
        return $this->isGestore;
    }

    /**
     * @param int $isGestore
     */
    public function setIsGestore($isGestore)
    {
        $this->isGestore = $isGestore;
    }
}