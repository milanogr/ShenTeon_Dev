<?php

namespace Gdr\MeteoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Moon
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gdr\MeteoBundle\Entity\MoonRepository")
 * @Vich\Uploadable
 */
class Moon
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
     * @ORM\Column(name="duration", type="integer")
     */
    private $duration = 1;

    /**
     * @var integer
     *
     * @ORM\Column(name="sort", type="integer")
     */
    private $sort = 1;

    /**
     * @Assert\Image()
     * @Vich\UploadableField(mapping="meteo_image", fileNameProperty="imageName")
     *
     */
    protected $image;

    /**
     * @var string
     *
     * @ORM\Column(name="imageName", type="string", nullable=true, length=255)
     */
    private $imageName;

    /**
     *
     * @ORM\OneToMany(targetEntity="MoonStatus", mappedBy="moon", cascade={"all"})
     */
    private $status;
    
    /**
     * @var \datetime
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="boolean")
     */
    private $changeWolf = false;

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
     * @return Moon
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
     * Set imageName
     *
     * @param string $imageName
     * @return Moon
     */
    public function setImageName($imageName)
    {
        $this->imageName = $imageName;
    
        return $this;
    }

    /**
     * Get imageName
     *
     * @return string 
     */
    public function getImageName()
    {
        return $this->imageName;
    }


    public function __toString(){
        return $this->getName() ??  '';
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->status = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Set duration
     *
     * @param integer $duration
     * @return Moon
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
    
        return $this;
    }

    /**
     * Get duration
     *
     * @return integer 
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Add status
     *
     * @param \Gdr\MeteoBundle\Entity\MoonStatus $status
     * @return Moon
     */
    public function addStatu(\Gdr\MeteoBundle\Entity\MoonStatus $status)
    {
        $this->status[] = $status;
    
        return $this;
    }

    /**
     * Remove status
     *
     * @param \Gdr\MeteoBundle\Entity\MoonStatus $status
     */
    public function removeStatu(\Gdr\MeteoBundle\Entity\MoonStatus $status)
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
     * Set sort
     *
     * @param integer $sort
     * @return Moon
     */
    public function setSort($sort)
    {
        $this->sort = $sort;
    
        return $this;
    }

    /**
     * Get sort
     *
     * @return integer 
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Moon
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

    /**
     * @return mixed
     */
    public function getChangeWolf()
    {
        return $this->changeWolf;
    }

    /**
     * @param mixed $changeWolf
     */
    public function setChangeWolf($changeWolf)
    {
        $this->changeWolf = $changeWolf;
    }
}