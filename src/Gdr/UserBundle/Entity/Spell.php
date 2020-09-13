<?php

namespace Gdr\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Spell
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gdr\UserBundle\Entity\SpellRepository")
 */
class Spell
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */

    protected $name;

    /**
     * @ORM\ManyToOne(targetEntity="SpellCategory", fetch="EAGER")
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    protected $category;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    protected $description;

    /**
     * @var string
     *
     * @ORM\Column(name="chatDescription", type="text")
     */
    protected $chatDescription;

    /**
     * @var integer
     *
     * @ORM\Column(name="level", type="integer")
     */
    protected $level = 1;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isActive", type="boolean")
     */
    protected $isActive = true;

    /**
     * @var \datetime $created
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $createdAt;

    public function __toString(){
        return (string) $this->getName();
    }

    public static function getLevels()
    {
        return array(1 => 1, 2, 3, 4, 5, 6);
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
     * @return Spell
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
     * Set description
     *
     * @param string $description
     * @return Spell
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set chatDescription
     *
     * @param string $chatDescription
     * @return Spell
     */
    public function setChatDescription($chatDescription)
    {
        $this->chatDescription = $chatDescription;
    
        return $this;
    }

    /**
     * Get chatDescription
     *
     * @return string 
     */
    public function getChatDescription()
    {
        return $this->chatDescription;
    }

    /**
     * Set level
     *
     * @param integer $level
     * @return Spell
     */
    public function setLevel($level)
    {
        $this->level = $level;
    
        return $this;
    }

    /**
     * Get level
     *
     * @return integer 
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return Spell
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
     * Set category
     *
     * @param \Gdr\UserBundle\Entity\SpellCategory $category
     * @return Spell
     */
    public function setCategory(\Gdr\UserBundle\Entity\SpellCategory $category = null)
    {
        $this->category = $category;
    
        return $this;
    }

    /**
     * Get category
     *
     * @return \Gdr\UserBundle\Entity\SpellCategory 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @return \datetime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \datetime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Metodo per il form optgroup.
     *
     * @return string
     */
    public function getCategoryName(){
        return $this->getCategory()->getName();
    }
}