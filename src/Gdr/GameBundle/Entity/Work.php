<?php

namespace Gdr\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Work
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gdr\GameBundle\Entity\WorkRepository")
 */
class Work
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="slots", type="integer")
     */
    private $slots = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="max", type="integer")
     */
    private $max;

    /**
     * @var integer
     *
     * @ORM\Column(name="pay", type="integer")
     */
    private $pay;

    public function getAvailable(){
        return $this->getMax()-$this->getSlots();
    }

    public function getIsFree(){
        return ($this->getAvailable() > 0);
    }

    public function fillSlot(){
        return $this->setSlots($this->getSlots()+1);
    }

    public function resetSlots(){
        return $this->setSlots(0);
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
     * @return Work
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
     * Set slots
     *
     * @param integer $slots
     * @return Work
     */
    public function setSlots($slots)
    {
        $this->slots = $slots;
    
        return $this;
    }

    /**
     * Get slots
     *
     * @return integer 
     */
    public function getSlots()
    {
        return $this->slots;
    }

    /**
     * Set pay
     *
     * @param integer $pay
     * @return Work
     */
    public function setPay($pay)
    {
        $this->pay = $pay;
    
        return $this;
    }

    /**
     * Get pay
     *
     * @return integer 
     */
    public function getPay()
    {
        return $this->pay;
    }

    /**
     * Set max
     *
     * @param integer $max
     * @return Work
     */
    public function setMax($max)
    {
        $this->max = $max;
    
        return $this;
    }

    /**
     * Get max
     *
     * @return integer 
     */
    public function getMax()
    {
        return $this->max;
    }
}
