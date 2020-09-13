<?php

namespace Gdr\MeteoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * MeteoCondition
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gdr\MeteoBundle\Entity\MeteoConditionRepository")
 * @Vich\Uploadable
 */
class MeteoCondition
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
     * @ORM\OneToMany(targetEntity="MeteoCombination", mappedBy="condition", cascade={"all"})
     */
    private $combinations;

    /**
     * @var integer
     *
     * @ORM\OneToMany(targetEntity="MeteoMessage", mappedBy="start", cascade={"all"})
     */
    private $starts;

    /**
     * @var integer
     *
     * @ORM\OneToMany(targetEntity="MeteoMessage", mappedBy="end", cascade={"all"})
     */
    private $ends;

    /**
     *
     * @ORM\OneToMany(targetEntity="MeteoStatus", mappedBy="condition", cascade={"all"})
     */
    private $status;

    /**
     * @Assert\Image()
     * @Vich\UploadableField(mapping="meteo_image", fileNameProperty="imageName")
     *
     */
    protected $image;

    /**
     * @ORM\Column(type="string", length=255, name="imageName")
     * @var string $imageName
     */
    protected $imageName;

    /**
     * @Assert\Image()
     * @Vich\UploadableField(mapping="meteo_image", fileNameProperty="imageNameNight")
     *
     */
    protected $imageNight;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string $imageName
     */
    protected $imageNameNight;

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
     * @return MeteoCondition
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
     * Constructor
     */
    public function __construct()
    {
        $this->combinations = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString(){
        return $this->getName() ??  '';
    }

    /**
     * Add combinations
     *
     * @param \Gdr\MeteoBundle\Entity\MeteoCombination $combinations
     * @return MeteoCondition
     */
    public function addCombination(\Gdr\MeteoBundle\Entity\MeteoCombination $combinations)
    {
        $this->combinations[] = $combinations;
    
        return $this;
    }

    /**
     * Remove combinations
     *
     * @param \Gdr\MeteoBundle\Entity\MeteoCombination $combinations
     */
    public function removeCombination(\Gdr\MeteoBundle\Entity\MeteoCombination $combinations)
    {
        $this->combinations->removeElement($combinations);
    }

    /**
     * Get combinations
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCombinations()
    {
        return $this->combinations;
    }

    /**
     * Add starts
     *
     * @param \Gdr\MeteoBundle\Entity\MeteoMessage $starts
     * @return MeteoCondition
     */
    public function addStart(\Gdr\MeteoBundle\Entity\MeteoMessage $starts)
    {
        $this->starts[] = $starts;
    
        return $this;
    }

    /**
     * Remove starts
     *
     * @param \Gdr\MeteoBundle\Entity\MeteoMessage $starts
     */
    public function removeStart(\Gdr\MeteoBundle\Entity\MeteoMessage $starts)
    {
        $this->starts->removeElement($starts);
    }

    /**
     * Get starts
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getStarts()
    {
        return $this->starts;
    }

    /**
     * Add ends
     *
     * @param \Gdr\MeteoBundle\Entity\MeteoMessage $ends
     * @return MeteoCondition
     */
    public function addEnd(\Gdr\MeteoBundle\Entity\MeteoMessage $ends)
    {
        $this->ends[] = $ends;
    
        return $this;
    }

    /**
     * Remove ends
     *
     * @param \Gdr\MeteoBundle\Entity\MeteoMessage $ends
     */
    public function removeEnd(\Gdr\MeteoBundle\Entity\MeteoMessage $ends)
    {
        $this->ends->removeElement($ends);
    }

    /**
     * Get ends
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEnds()
    {
        return $this->ends;
    }

    /**
     * Add status
     *
     * @param \Gdr\MeteoBundle\Entity\MeteoStatus $status
     * @return MeteoCondition
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

    /**
     * @return mixed
     */
    public function getImageNight()
    {
        return $this->imageNight;
    }

    /**
     * @param mixed $imageNight
     */
    public function setImageNight($imageNight)
    {
        $this->imageNight = $imageNight;

        if ($imageNight instanceof UploadedFile) {
            $this->setUpdatedAt(new \DateTime());
        }
    }

    /**
     * @return string
     */
    public function getImageNameNight()
    {
        return $this->imageNameNight;
    }

    /**
     * @param string $imageNameNight
     */
    public function setImageNameNight($imageNameNight)
    {
        $this->imageNameNight = $imageNameNight;
    }
}