<?php

namespace Gdr\AvatarBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Experience
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gdr\AvatarBundle\Entity\ExperienceRepository")
 */
class Experience
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
     * @ORM\Column(name="body", type="string", length=255)
     */
    protected $body;

    /**
     * @ORM\ManyToOne(targetEntity="Gdr\UserBundle\Entity\Personage")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    protected $personage;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    protected $createdAt;


    /**
     * @var boolean
     * @ORM\Column(name="isInvisible", type="boolean")
     */
    protected $isInvisible = false;


    public function __toString(){
        return (string) 'Esperienza #'.$this->getId();
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
     * Set body
     *
     * @param string $body
     * @return Experience
     */
    public function setBody($body)
    {
        $this->body = $body;
    
        return $this;
    }

    /**
     * Get body
     *
     * @return string 
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Experience
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
     * Set personage
     *
     * @param \Gdr\UserBundle\Entity\Personage $personage
     * @return Experience
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
     * Set isInvisible
     *
     * @param boolean $isInvisible
     * @return Experience
     */
    public function setIsInvisible($isInvisible)
    {
        $this->isInvisible = $isInvisible;
    
        return $this;
    }

    /**
     * Get isInvisible
     *
     * @return boolean 
     */
    public function getIsInvisible()
    {
        return $this->isInvisible;
    }
}