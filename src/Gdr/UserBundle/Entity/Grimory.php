<?php

namespace Gdr\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Grimory
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gdr\UserBundle\Entity\GrimoryRepository")
 */
class Grimory
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
     * @ORM\ManyToOne(targetEntity="Personage")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $personage;

    /**
     * @ORM\ManyToOne(targetEntity="Spell")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $spell;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isLearned = false;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isSelected = true;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isUsed = false;

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
     * @return Grimory
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
     * Set spell
     *
     * @param \Gdr\UserBundle\Entity\Spell $spell
     * @return Grimory
     */
    public function setSpell(\Gdr\UserBundle\Entity\Spell $spell = null)
    {
        $this->spell = $spell;
    
        return $this;
    }

    /**
     * Get spell
     *
     * @return \Gdr\UserBundle\Entity\Spell 
     */
    public function getSpell()
    {
        return $this->spell;
    }

    /**
     * @return mixed
     */
    public function getIsLearned()
    {
        return $this->isLearned;
    }

    /**
     * @param mixed $isLearned
     */
    public function setIsLearned($isLearned)
    {
        $this->isLearned = $isLearned;
    }

    /**
     * @return mixed
     */
    public function getIsSelected()
    {
        return $this->isSelected;
    }

    /**
     * @param mixed $isSelected
     */
    public function setIsSelected($isSelected)
    {
        $this->isSelected = $isSelected;
    }

    /**
     * @return mixed
     */
    public function getIsUsed()
    {
        return $this->isUsed;
    }

    /**
     * @param mixed $isUsed
     */
    public function setIsUsed($isUsed)
    {
        $this->isUsed = $isUsed;
    }

    /**
     * recupero il nome dell'incanto e aggiungo parentesi
     */
    public function getNameForForm(){

    }
}