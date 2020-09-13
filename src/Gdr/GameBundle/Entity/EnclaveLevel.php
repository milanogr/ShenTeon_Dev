<?php

namespace Gdr\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * EnclaveLevel
 *
 * @ORM\Table()
 * @ORM\Entity
 * @Vich\Uploadable
 */
class EnclaveLevel
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
     * @ORM\Column(type="integer")
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
     * @var datetime
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $updatedAt;

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
     * @return EnclaveLevel
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
     * @return \Symfony\Component\HttpFoundation\File\File
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * @param $icon
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;

        if ($icon instanceof UploadedFile) {
            $this->setUpdatedAt(new \DateTime());
        }
    }

    /**
     * Set iconName
     *
     * @param string $iconName
     *
     * @return EnclaveLevel
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
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return EnclaveLevel
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}
