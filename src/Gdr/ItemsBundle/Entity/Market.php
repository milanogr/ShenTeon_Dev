<?php

namespace Gdr\ItemsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Market
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Market
{
    const EMPORIO = 'Emporio';
    const NERO = 'Mercato Nero';
    const POZIONI = 'Mercato Pozioni';
    const ENCLAVE = 'Mercato di Enclave';
    const CLAN = 'Mercato di Enclave Razziale';

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    protected $name;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isActive", type="boolean")
     */
    protected $isActive = true;

    /**
     * @ORM\ManyToMany(targetEntity="ItemType", mappedBy="markets")
     */
    protected $categories;

    /**xc
     * @ORM\Column(type="integer")
     */
    protected $startLevel = 0;

    public function __toString()
    {
        return (string)$this->getName();
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
     * @return Market
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
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return Market
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->categories = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add categories
     *
     * @param \Gdr\ItemsBundle\Entity\ItemType $categories
     *
     * @return Market
     */
    public function addCategorie(\Gdr\ItemsBundle\Entity\ItemType $categories)
    {
        $this->categories[] = $categories;

        return $this;
    }

    /**
     * Remove categories
     *
     * @param \Gdr\ItemsBundle\Entity\ItemType $categories
     */
    public function removeCategorie(\Gdr\ItemsBundle\Entity\ItemType $categories)
    {
        $this->categories->removeElement($categories);
    }

    /**
     * Get categories
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @return mixed
     */
    public function getStartLevel()
    {
        return $this->startLevel;
    }

    /**
     * @param mixed $startLevel
     */
    public function setStartLevel($startLevel)
    {
        $this->startLevel = $startLevel;
    }
}