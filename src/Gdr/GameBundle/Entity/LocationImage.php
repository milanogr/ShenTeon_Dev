<?php

namespace Gdr\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * LocationImage
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gdr\GameBundle\Entity\LocationImageRepository")
 * @Vich\Uploadable
 */
class LocationImage
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
     * @ORM\ManyToOne(targetEntity="Location")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $location;

    /**
     * @ORM\ManyToOne(targetEntity="Gdr\MeteoBundle\Entity\MeteoCondition")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $condition;

    /**
     * @Assert\Image()
     * @Vich\UploadableField(mapping="location_image", fileNameProperty="imageName")
     *
     * @var File $image
     */
    protected $image;

    /**
     * @ORM\Column(type="string", length=255, name="imageName")
     * @var string $imageName
     */
    private $imageName;

    /**
     * @ORM\Column(type="boolean")
     */
    private $forNight = false;

    /**
     * @var datetime
     * @ORM\Column(type="datetime")
     */
    protected $updatedAt;


    public function __toString(){
        return (string) "Immagine della Location #".$this->getId();
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
     * Set location
     *
     * @param \Gdr\GameBundle\Entity\Location $location
     * @return LocationImage
     */
    public function setLocation(\Gdr\GameBundle\Entity\Location $location = null)
    {
        $this->location = $location;
    
        return $this;
    }

    /**
     * Get location
     *
     * @return \Gdr\GameBundle\Entity\Location 
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set condition
     *
     * @param \Gdr\MeteoBundle\Entity\MeteoCondition $condition
     * @return LocationImage
     */
    public function setCondition(\Gdr\MeteoBundle\Entity\MeteoCondition $condition = null)
    {
        $this->condition = $condition;
    
        return $this;
    }

    /**
     * Get condition
     *
     * @return \Gdr\MeteoBundle\Entity\MeteoCondition 
     */
    public function getCondition()
    {
        return $this->condition;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\File\File $image
     */
    public function setImage($image)
    {
        $this->image = $image;

        if ($image instanceof UploadedFile) {
            $this->setUpdatedAt(new \DateTime());
        }
    }

    /**
     * @return \Symfony\Component\HttpFoundation\File\File
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $imageName
     */
    public function setImageName($imageName)
    {
        $this->imageName = $imageName;
    }

    /**
     * @return string
     */
    public function getImageName()
    {
        return $this->imageName;
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
    public function getForNight()
    {
        return $this->forNight;
    }

    /**
     * @param mixed $forNight
     */
    public function setForNight($forNight)
    {
        $this->forNight = $forNight;
    }
}
