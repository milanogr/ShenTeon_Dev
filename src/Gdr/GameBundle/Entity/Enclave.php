<?php

namespace Gdr\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Enclave
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gdr\GameBundle\Entity\EnclaveRepository")
 * @Vich\Uploadable
 */
class Enclave
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
     * @Assert\NotBlank(message="Devi scegliere un nome per l'enclave")
     */
    protected $name;

    /**
     * @ORM\ManyToOne(targetEntity="EnclaveCategory")
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    protected $category;

    /**
     * @Assert\Image()
     * @Vich\UploadableField(mapping="enclave_upload", fileNameProperty="bannerName")
     *
     * @var File $icon
     */
    protected $banner;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    protected $bannerName;

    /**
     * @Assert\Image()
     * @Vich\UploadableField(mapping="enclave_upload", fileNameProperty="shieldName")
     *
     * @var File $icon
     */
    protected $shield;

    /**
     * @var string
     *
     * @ORM\Column(name="shieldName", type="string", length=255)
     */
    protected $shieldName;

    /**
     * @var string
     *
     * @ORM\Column(name="statute", type="text", nullable=true)
     */
    protected $statute;

    /**
     * @var string
     *
     * @ORM\Column(name="annex", type="text", nullable=true)
     */
    protected $annex;

    /**
     * @ORM\OneToMany(targetEntity="EnclaveRank", mappedBy="enclave", cascade={"persist", "remove"})
     */
    protected $ranks;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $maxMembers;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $isActive = false;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $isClan = false;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $isNobili = false;

    /**
     * @ORM\Column(type="boolean")
     */
    private $notOfficial = false;

    /**
     * @var datetime
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $updatedAt;

    public function __toString()
    {
        return (string) $this->getName();
    }

    /**
     * @return \Symfony\Component\HttpFoundation\File\File
     */
    public function getBanner()
    {
        return $this->banner;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\File\File $banner
     */
    public function setBanner($banner)
    {
        $this->banner = $banner;

        if ($banner instanceof UploadedFile) {
            $this->setUpdatedAt(new \DateTime());
        }
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ranks = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Enclave
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
     * Set bannerName
     *
     * @param string $bannerName
     * @return Enclave
     */
    public function setBannerName($bannerName)
    {
        $this->bannerName = $bannerName;
    
        return $this;
    }

    /**
     * Get bannerName
     *
     * @return string 
     */
    public function getBannerName()
    {
        return $this->bannerName;
    }

    /**
     * Set statute
     *
     * @param string $statute
     * @return Enclave
     */
    public function setStatute($statute)
    {
        $this->statute = $statute;
    
        return $this;
    }

    /**
     * Get statute
     *
     * @return string 
     */
    public function getStatute()
    {
        return $this->statute;
    }

    /**
     * Set annex
     *
     * @param string $annex
     * @return Enclave
     */
    public function setAnnex($annex)
    {
        $this->annex = $annex;
    
        return $this;
    }

    /**
     * Get annex
     *
     * @return string 
     */
    public function getAnnex()
    {
        return $this->annex;
    }

    /**
     * Set category
     *
     * @param \Gdr\GameBundle\Entity\EnclaveCategory $category
     * @return Enclave
     */
    public function setCategory(\Gdr\GameBundle\Entity\EnclaveCategory $category = null)
    {
        $this->category = $category;
    
        return $this;
    }

    /**
     * Get category
     *
     * @return \Gdr\GameBundle\Entity\EnclaveCategory 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Add ranks
     *
     * @param \Gdr\GameBundle\Entity\EnclaveRank $ranks
     * @return Enclave
     */
    public function addRank(\Gdr\GameBundle\Entity\EnclaveRank $ranks)
    {
        $this->ranks[] = $ranks;
    
        return $this;
    }

    /**
     * Remove ranks
     *
     * @param \Gdr\GameBundle\Entity\EnclaveRank $ranks
     */
    public function removeRank(\Gdr\GameBundle\Entity\EnclaveRank $ranks)
    {
        $this->ranks->removeElement($ranks);
    }

    /**
     * Get ranks
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRanks()
    {
        return $this->ranks;
    }

    /**
     * @return \Gdr\GameBundle\Entity\datetime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \Gdr\GameBundle\Entity\datetime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return mixed
     */
    public function getMaxMembers()
    {
        return $this->maxMembers;
    }

    /**
     * @param mixed $maxMembers
     */
    public function setMaxMembers($maxMembers)
    {
        $this->maxMembers = $maxMembers;
    }

    /**
     * @return mixed
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * @param mixed $isActive
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    }

    /**
     * @return mixed
     */
    public function getIsClan()
    {
        return $this->isClan;
    }

    /**
     * @param mixed $isClan
     */
    public function setIsClan($isClan)
    {
        $this->isClan = $isClan;
    }

    /**
     * @return mixed
     */
    public function getIsNobili()
    {
        return $this->isNobili;
    }

    /**
     * @param mixed $isNobili
     */
    public function setIsNobili($isNobili)
    {
        $this->isNobili = $isNobili;
    }

    /**
     * @return mixed
     */
    public function getNotOfficial()
    {
        return $this->notOfficial;
    }

    /**
     * @param mixed $notOfficial
     */
    public function setNotOfficial($notOfficial)
    {
        $this->notOfficial = $notOfficial;
    }

    /**
     * Set shieldName
     *
     * @param string $shieldName
     * @return Enclave
     */
    public function setShieldName($shieldName)
    {
        $this->shieldName = $shieldName;

        return $this;
    }

    /**
     * Get shieldName
     *
     * @return string 
     */
    public function getShieldName()
    {
        return $this->shieldName;
    }

    /**
     * @return \Symfony\Component\HttpFoundation\File\File
     */
    public function getShield()
    {
        return $this->shield;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\File\File $shield
     */
    public function setShield($shield)
    {
        $this->shield = $shield;

        if ($shield){
            $this->setUpdatedAt(new \DateTime());
        }
    }
}
