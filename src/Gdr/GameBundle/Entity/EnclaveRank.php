<?php

namespace Gdr\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * EnclaveRole
 *
 * @ORM\Table()
 * @ORM\Entity
 * @Vich\Uploadable
 */
class EnclaveRank
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
     * @Assert\Image()
     * @Vich\UploadableField(mapping="enclave_upload", fileNameProperty="iconName")
     *
     * @var File $icon
     */
    protected $icon;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $iconName;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="EnclaveLevel")
     */
    protected $level;

    /**
     * @ORM\ManyToOne(targetEntity="Enclave", inversedBy="ranks")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    protected $enclave;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $isMaster = false;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $isViceMaster = false;

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
     * @return EnclaveRole
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
     * Set iconName
     *
     * @param string $iconName
     *
     * @return EnclaveRank
     */
    public function setIconName($iconName)
    {
        $this->iconName = $iconName;

        return $this;
    }

    /**
     * Get iconName
     *
     * @return string
     */
    public function getIconName()
    {
        return $this->iconName;
    }

    /**
     * Set enclave
     *
     * @param \Gdr\GameBundle\Entity\Enclave $enclave
     *
     * @return EnclaveRank
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
     * @return \Symfony\Component\HttpFoundation\File\File
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\File\File $icon
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;

        if ($icon instanceof UploadedFile) {
            $this->setUpdatedAt(new \DateTime());
        }
    }

    /**
     * Constructor
     */
    public function __construct()
    {

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
    public function getIsMaster()
    {
        return $this->isMaster;
    }

    /**
     * @param mixed $isMaster
     */
    public function setIsMaster($isMaster)
    {
        $this->isMaster = $isMaster;
    }

    /**
     * @return mixed
     */
    public function getIsViceMaster()
    {
        return $this->isViceMaster;
    }

    /**
     * @param mixed $isViceMaster
     */
    public function setIsViceMaster($isViceMaster)
    {
        $this->isViceMaster = $isViceMaster;
    }

    /**
     * Set level
     *
     * @param \Gdr\GameBundle\Entity\EnclaveLevel $level
     * @return EnclaveRank
     */
    public function setLevel(\Gdr\GameBundle\Entity\EnclaveLevel $level = null)
    {
        $this->level = $level;
    
        return $this;
    }

    /**
     * Get level
     *
     * @return \Gdr\GameBundle\Entity\EnclaveLevel 
     */
    public function getLevel()
    {
        return $this->level;
    }
}
