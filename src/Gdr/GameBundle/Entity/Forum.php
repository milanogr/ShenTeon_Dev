<?php

namespace Gdr\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Forum
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gdr\GameBundle\Entity\ForumRepository")
 */
class Forum
{
    const TYPE_PUBLIC = 'Pubblico';
    const TYPE_ENCLAVE = 'Enclave';
    const TYPE_CLAN = 'Clan';
    const TYPE_MOD = 'Moderatori';
    const TYPE_FATE = 'Fato';
    const TYPE_MASTER = 'Master Enclave';
    const TYPE_GESTIONE = 'Gestione';
    const TYPE_STRILLONE = 'Strillone';
    const TYPE_ARALDO = 'Araldo';
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
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * Viene usata per far identificare l'appartenenza a Enclave o Clan.
     *
     * @ORM\ManyToOne(targetEntity="Gdr\GameBundle\Entity\Enclave")
     * @ORM\JoinColumn(onDelete="cascade")
     */
    private $enclave;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $sorting = 0;

    /** @ORM\Column(type="boolean") */
    private $allowSoul = false;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     */
    private $isActive = true;

    public function __toString()
    {
        return (string)$this->getName();
    }

    public static function getTypes()
    {
        return array(
            self::TYPE_PUBLIC => self::TYPE_PUBLIC,
            self::TYPE_ENCLAVE => self::TYPE_ENCLAVE,
            self::TYPE_CLAN => self::TYPE_CLAN,
            self::TYPE_MOD => self::TYPE_MOD,
            self::TYPE_FATE => self::TYPE_FATE,
            self::TYPE_MASTER => self::TYPE_MASTER,
            self::TYPE_GESTIONE => self::TYPE_GESTIONE,
            self::TYPE_STRILLONE => self::TYPE_STRILLONE,
            self::TYPE_ARALDO => self::TYPE_ARALDO
        );
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
     *
     * @return Forum
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
     * Set type
     *
     * @param integer $type
     *
     * @return Forum
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return integer
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set enclave
     *
     * @param \Gdr\GameBundle\Entity\Enclave $enclave
     *
     * @return Forum
     */
    public function setEnclave(\Gdr\GameBundle\Entity\Enclave $enclave = null)
    {
        $this->enclave = $enclave;

        return $this;
    }

    /**
     * Get enclave
     *
     * @return \Gdr\GameBundle\Entity\Enclave
     */
    public function getEnclave()
    {
        return $this->enclave;
    }

    /**
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * @param boolean $isActive
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    }

    /**
     * @return mixed
     */
    public function getSorting()
    {
        return $this->sorting;
    }

    /**
     * @param mixed $sorting
     */
    public function setSorting($sorting)
    {
        $this->sorting = $sorting;
    }

    /**
     * @return boolean
     */
    public function getAllowSoul()
    {
        return $this->allowSoul;
    }

    /**
     * @param boolean $allowSoul
     */
    public function setAllowSoul($allowSoul)
    {
        $this->allowSoul = $allowSoul;
    }
}
