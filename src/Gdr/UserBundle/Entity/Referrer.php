<?php

namespace Gdr\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Referrer
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gdr\UserBundle\Entity\ReferrerRepository")
 */
class Referrer
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
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $newUser;

    /**
     * @ORM\ManyToOne(targetEntity="Personage")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $newPersonage;

    /**
     * @ORM\ManyToOne(targetEntity="Personage")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $referrerPersonage;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    private $createdAt;

    /**
     * Se true significa che entrambi son stati pagati.
     * Se false significa che non sono stati pagati.
     * @var boolean
     *
     * @ORM\Column(name="isPaid", type="boolean")
     */
    private $isPaid = false;

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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Referrer
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
     * Set isPaid
     *
     * @param boolean $isPaid
     * @return Referrer
     */
    public function setIsPaid($isPaid)
    {
        $this->isPaid = $isPaid;
    
        return $this;
    }

    /**
     * Get isPaid
     *
     * @return boolean 
     */
    public function getIsPaid()
    {
        return $this->isPaid;
    }

    /**
     * Set newPersonage
     *
     * @param \Gdr\UserBundle\Entity\Personage $newPersonage
     * @return Referrer
     */
    public function setNewPersonage(\Gdr\UserBundle\Entity\Personage $newPersonage = null)
    {
        $this->newPersonage = $newPersonage;
    
        return $this;
    }

    /**
     * Get newPersonage
     *
     * @return \Gdr\UserBundle\Entity\Personage 
     */
    public function getNewPersonage()
    {
        return $this->newPersonage;
    }

    /**
     * Set referrerPersonage
     *
     * @param \Gdr\UserBundle\Entity\Personage $referrerPersonage
     * @return Referrer
     */
    public function setReferrerPersonage(\Gdr\UserBundle\Entity\Personage $referrerPersonage = null)
    {
        $this->referrerPersonage = $referrerPersonage;
    
        return $this;
    }

    /**
     * Get referrerPersonage
     *
     * @return \Gdr\UserBundle\Entity\Personage 
     */
    public function getReferrerPersonage()
    {
        return $this->referrerPersonage;
    }

    /**
     * Set newUser
     *
     * @param \Gdr\UserBundle\Entity\User $newUser
     * @return Referrer
     */
    public function setNewUser(\Gdr\UserBundle\Entity\User $newUser = null)
    {
        $this->newUser = $newUser;
    
        return $this;
    }

    /**
     * Get newUser
     *
     * @return \Gdr\UserBundle\Entity\User 
     */
    public function getNewUser()
    {
        return $this->newUser;
    }
}