<?php

namespace Gdr\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CombatLearned
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gdr\GameBundle\Entity\CombatLearnedRepository")
 */
class CombatLearned
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
     * @ORM\ManyToOne(targetEntity="Gdr\GameBundle\Entity\CombatSet")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $combatSet;

    /**
     * @var integer
     *
     * @ORM\Column(name="setLevel", type="integer")
     */
    private $setLevel = 0;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    private $levelDescription = "Competenza Basilare";

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
     */
    public function setPersonage($personage)
    {
        $this->personage = $personage;

        return $this;
    }

    /**
     * Get personage
     *
     */
    public function getPersonage()
    {
        return $this->personage;
    }

    /**
     * Set combatSet
     *
     */
    public function setCombatSet($combatSet)
    {
        $this->combatSet = $combatSet;

        return $this;
    }

    /**
     * Get combatSet
     *
     */
    public function getCombatSet()
    {
        return $this->combatSet;
    }

    /**
     * Set setLevel
     *
     */
    public function setSetLevel($setLevel)
    {
        $this->setLevel = $setLevel;

        return $this;
    }

    /**
     * Get setLevel
     *
     */
    public function getSetLevel()
    {
        return $this->setLevel;
    }

    /**
     * @return mixed
     */
    public function getLevelDescription()
    {
        return $this->levelDescription;
    }

    /**
     * @param mixed $levelDescription
     */
    public function setLevelDescription($levelDescription)
    {
        $this->levelDescription = $levelDescription;
    }
}
