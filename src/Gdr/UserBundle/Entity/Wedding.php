<?php

namespace Gdr\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Gedmo\Mapping\Annotation as Gedmo;
use Gdr\GameBundle\Validator\Constraint as GameAssert;

/**
 * Wedding
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gdr\UserBundle\Entity\WeddingRepository")
 */
class Wedding
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
     * @ORM\Column(name="type", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="officiate", type="string", length=255)
     */
    private $officiate;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $officiateDivorce;

    /**
     * @ORM\ManyToOne(targetEntity="Gdr\UserBundle\Entity\Personage")
     * @ORM\JoinColumn(onDelete="SET NULL")
     * @Assert\NotBlank()
     * @GameAssert\NoMarried()
     */
    private $groom;

    /**
     * @ORM\ManyToOne(targetEntity="Gdr\UserBundle\Entity\Personage")
     * @ORM\JoinColumn(onDelete="SET NULL")
     * @Assert\NotBlank()
     * @GameAssert\NoMarried()
     */
    private $bride;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isDivorced", type="boolean", nullable=true)
     */
    private $isDivorced = false;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isMaleWidow", type="boolean", nullable=true)
     */
    private $isMaleWidow;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isFemaleWidow", type="boolean", nullable=true)
     */
    private $isFemaleWidow;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    protected $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="endedAt", type="datetime", nullable=true)
     */
    protected $endedAt;


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
     * Set type
     *
     * @param string $type
     * @return Wedding
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set isDivorced
     *
     * @param boolean $isDivorced
     * @return Wedding
     */
    public function setIsDivorced($isDivorced)
    {
        $this->isDivorced = $isDivorced;

        return $this;
    }

    /**
     * Get isDivorced
     *
     * @return boolean
     */
    public function getIsDivorced()
    {
        return $this->isDivorced;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Wedding
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
     * Set groom
     *
     * @param \Gdr\UserBundle\Entity\Personage $groom
     * @return Wedding
     */
    public function setGroom(\Gdr\UserBundle\Entity\Personage $groom = null)
    {
        $this->groom = $groom;

        return $this;
    }

    /**
     * Get groom
     *
     * @return \Gdr\UserBundle\Entity\Personage
     */
    public function getGroom()
    {
        return $this->groom;
    }

    /**
     * Set bride
     *
     * @param \Gdr\UserBundle\Entity\Personage $bride
     * @return Wedding
     */
    public function setBride(\Gdr\UserBundle\Entity\Personage $bride = null)
    {
        $this->bride = $bride;

        return $this;
    }

    /**
     * Get bride
     *
     * @return \Gdr\UserBundle\Entity\Personage
     */
    public function getBride()
    {
        return $this->bride;
    }

    /**
     * Set officiate
     *
     * @param string $officiate
     * @return Wedding
     */
    public function setOfficiate($officiate)
    {
        $this->officiate = $officiate;

        return $this;
    }

    /**
     * Get officiate
     *
     * @return string
     */
    public function getOfficiate()
    {
        return $this->officiate;
    }

    /**
     * Set isMaleWidow
     *
     * @param boolean $isMaleWidow
     * @return Wedding
     */
    public function setIsMaleWidow($isMaleWidow)
    {
        $this->isMaleWidow = $isMaleWidow;

        return $this;
    }

    /**
     * Get isMaleWidow
     *
     * @return boolean
     */
    public function getIsMaleWidow()
    {
        return $this->isMaleWidow;
    }

    /**
     * Set isFemaleWidow
     *
     * @param boolean $isFemaleWidow
     * @return Wedding
     */
    public function setIsFemaleWidow($isFemaleWidow)
    {
        $this->isFemaleWidow = $isFemaleWidow;

        return $this;
    }

    /**
     * Get isFemaleWidow
     *
     * @return boolean
     */
    public function getIsFemaleWidow()
    {
        return $this->isFemaleWidow;
    }

    /**
     * Set endedAt
     *
     * @param \DateTime $endedAt
     * @return Wedding
     */
    public function setEndedAt($endedAt)
    {
        $this->endedAt = $endedAt;

        return $this;
    }

    /**
     * Get endedAt
     *
     * @return \DateTime
     */
    public function getEndedAt()
    {
        return $this->endedAt;
    }

    /**
     * Set officiateDivorce
     *
     * @param string $officiateDivorce
     * @return Wedding
     */
    public function setOfficiateDivorce($officiateDivorce)
    {
        $this->officiateDivorce = $officiateDivorce;

        return $this;
    }

    /**
     * Get officiateDivorce
     *
     * @return string
     */
    public function getOfficiateDivorce()
    {
        return $this->officiateDivorce;
    }
}