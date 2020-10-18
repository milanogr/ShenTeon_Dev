<?php

namespace Gdr\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Transaction
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gdr\GameBundle\Entity\TransactionRepository")
 */
class Transaction
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
    private $subject;

    /**
     * @ORM\ManyToOne(targetEntity="Gdr\UserBundle\Entity\Personage")
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    private $sender;

    /**
     * @ORM\ManyToOne(targetEntity="TransactionType")
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    private $type;

    /**
     * @var integer
     *
     * @ORM\Column(name="amount", type="integer")
     */
    private $amount = 0;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    private $createdAt;

    /**
     * @var bool
     * @ORM\Column(name="isPlus", type="boolean")
     */
    private $isPlus = 0;

    /**
     * @var bool
     * @ORM\Column(name="isHidden", type="boolean")
     */
    private $isHidden = false;

    /**
     * @var string
     *
     * @ORM\Column(name="note", type="string", length=255)
     * @Assert\Length(max = "250", maxMessage = "Non puoi superare i 250 caratteri")
     */
    private $note;

    public function __toString()
    {
        return (string)'Transazione #' . $this->getId();
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
     * Set amount
     *
     * @param integer $amount
     * @return Transaction
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    
        return $this;
    }

    /**
     * Get amount
     *
     * @return integer 
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set note
     *
     * @param string $note
     * @return Transaction
     */
    public function setNote($note)
    {
        $this->note = $note;
    
        return $this;
    }

    /**
     * Get note
     *
     * @return string 
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set subject
     *
     * @param \Gdr\UserBundle\Entity\Personage $subject
     * @return Transaction
     */
    public function setSubject(\Gdr\UserBundle\Entity\Personage $subject = null)
    {
        $this->subject = $subject;
    
        return $this;
    }

    /**
     * Get subject
     *
     * @return \Gdr\UserBundle\Entity\Personage 
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set type
     *
     * @param \Gdr\GameBundle\Entity\TransactionType $type
     * @return Transaction
     */
    public function setType(\Gdr\GameBundle\Entity\TransactionType $type = null)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return \Gdr\GameBundle\Entity\TransactionType 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Transaction
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    
        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set isPlus
     *
     * @param boolean $isPlus
     * @return Transaction
     */
    public function setIsPlus($isPlus)
    {
        $this->isPlus = $isPlus;
    
        return $this;
    }

    /**
     * Get isPlus
     *
     * @return boolean 
     */
    public function getIsPlus()
    {
        return $this->isPlus;
    }

    /**
     * Set sender
     *
     * @param \Gdr\UserBundle\Entity\Personage $sender
     * @return Transaction
     */
    public function setSender(\Gdr\UserBundle\Entity\Personage $sender = null)
    {
        $this->sender = $sender;
    
        return $this;
    }

    /**
     * Get sender
     *
     * @return \Gdr\UserBundle\Entity\Personage 
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * @return boolean
     */
    public function getIsHidden()
    {
        return $this->isHidden;
    }

    /**
     * @param boolean $isHidden
     */
    public function setIsHidden($isHidden)
    {
        $this->isHidden = $isHidden;
    }
}
