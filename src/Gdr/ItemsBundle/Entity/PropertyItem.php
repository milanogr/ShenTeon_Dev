<?php

namespace Gdr\ItemsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PropertyItem
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gdr\ItemsBundle\Entity\PropertyItemRepository")
 */
class PropertyItem
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
     * @ORM\ManyToOne(targetEntity="Property", fetch="EAGER")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    protected $property;

    /**
     * @ORM\ManyToOne(targetEntity="Item", fetch="EAGER")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    protected $item;

    /**
     * @ORM\Column(type="integer")
     */
    protected $quantity = 0;


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
     * Set quantity
     *
     * @param integer $quantity
     * @return PropertyItem
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    
        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer 
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set property
     *
     * @param \Gdr\ItemsBundle\Entity\Property $property
     * @return PropertyItem
     */
    public function setProperty(\Gdr\ItemsBundle\Entity\Property $property = null)
    {
        $this->property = $property;
    
        return $this;
    }

    /**
     * Get property
     *
     * @return \Gdr\ItemsBundle\Entity\Property 
     */
    public function getProperty()
    {
        return $this->property;
    }

    /**
     * Set item
     *
     * @param \Gdr\ItemsBundle\Entity\Item $item
     * @return PropertyItem
     */
    public function setItem(\Gdr\ItemsBundle\Entity\Item $item = null)
    {
        $this->item = $item;
    
        return $this;
    }

    /**
     * Get item
     *
     * @return \Gdr\ItemsBundle\Entity\Item 
     */
    public function getItem()
    {
        return $this->item;
    }
}