<?php

namespace Gdr\MeteoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * MeteoWind
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gdr\MeteoBundle\Entity\MeteoWindRepository")
 * @Vich\Uploadable
 */
class MeteoWind
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
     * @var boolean
     *
     * @ORM\Column(name="is_random", type="boolean")
     */
    protected $isRandom;

    /**
     *
     * @ORM\OneToMany(targetEntity="MeteoStatus", mappedBy="wind", cascade={"all"})
     */
    protected $status;

    protected $createdAt;

    /**
     * @Assert\Image()
     * @Vich\UploadableField(mapping="meteo_image", fileNameProperty="imageName")
     *
     */
    protected $image;

    /**
     * @ORM\Column(type="string", length=255, name="imageName", nullable=true)
     * @var string $imageName
     */
    protected $imageName;

    /**
     * @var \datetime
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $updatedAt;

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
     * @return MeteoWind
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
     * Set isRandom
     *
     * @param boolean $isRandom
     * @return MeteoWind
     */
    public function setIsRandom($isRandom)
    {
        $this->isRandom = $isRandom;
    
        return $this;
    }

    /**
     * Get isRandom
     *
     * @return boolean 
     */
    public function getIsRandom()
    {
        return $this->isRandom;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->status = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @return string
     */
    public function __toString(){
        return (string) $this->getName();
    }
    
    /**
     * Add status
     *
     * @param \Gdr\MeteoBundle\Entity\MeteoStatus $status
     * @return MeteoWind
     */
    public function addStatu(\Gdr\MeteoBundle\Entity\MeteoStatus $status)
    {
        $this->status[] = $status;
    
        return $this;
    }

    /**
     * Remove status
     *
     * @param \Gdr\MeteoBundle\Entity\MeteoStatus $status
     */
    public function removeStatu(\Gdr\MeteoBundle\Entity\MeteoStatus $status)
    {
        $this->status->removeElement($status);
    }

    /**
     * Get status
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;

        if ($image instanceof UploadedFile) {
            $this->setUpdatedAt(new \DateTime());
        }
    }

    /**
     * @return string
     */
    public function getImageName()
    {
        return $this->imageName;
    }

    /**
     * @param string $imageName
     */
    public function setImageName($imageName)
    {
        $this->imageName = $imageName;
    }

    /**
     * @return \datetime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \datetime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }
}