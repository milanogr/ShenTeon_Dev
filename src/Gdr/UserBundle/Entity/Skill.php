<?php

namespace Gdr\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Skill
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gdr\UserBundle\Entity\SkillRepository")
 * @Vich\Uploadable
 */
class Skill
{
    const MAX_LEVEL = 6;

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
     * @ORM\Column(type="text")
     */
    protected $description;

    /**
     * @ORM\ManyToOne(targetEntity="Gdr\RaceBundle\Entity\Race")
     * @ORM\JoinColumn(name="race_id", onDelete="SET NULL", nullable=true)
     */
    protected $race;

    /**
     * @ORM\Column(type="integer")
     */
    protected $level = 1;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isActive", type="boolean")
     */
    protected $isActive = true;

    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    protected $hoursToReload = 0;

    /**
     * @Assert\Image()
     * @Vich\UploadableField(mapping="skill_image", fileNameProperty="imageName")
     *
     */
    protected $image;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     * @var string $maleIconName
     */
    protected $imageName;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isRandom", type="boolean")
     */
    protected $isRandom = false;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updatedAt", type="datetime", nullable=true)
     */
    protected $updatedAt;

    public function __toString(){
        return (string) $this->getName();
    }

    public static function getLevels()
    {
        return array(1 => 1, 2, 3, 4, 5, 6);
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
     * @return Skill
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
     * Set isActive
     *
     * @param boolean $isActive
     * @return Skill
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    
        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set level
     *
     * @param integer $level
     * @return Skill
     */
    public function setLevel($level)
    {
        $this->level = $level;
    
        return $this;
    }

    /**
     * Get level
     *
     * @return integer 
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set race
     *
     * @param \Gdr\RaceBundle\Entity\Race $race
     * @return Skill
     */
    public function setRace(\Gdr\RaceBundle\Entity\Race $race = null)
    {
        $this->race = $race;
    
        return $this;
    }

    /**
     * Get race
     *
     * @return \Gdr\RaceBundle\Entity\Race 
     */
    public function getRace()
    {
        return $this->race;
    }

    /**
     * Set imageName
     *
     * @param string $imageName
     * @return Skill
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

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param $image
     */
    public function setImage($image)
    {
        $this->image = $image;

        if ($image instanceof UploadedFile) {
            $this->setUpdatedAt(new \DateTime());
        }
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Skill
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Skill
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return int
     */
    public function getHoursToReload()
    {
        return $this->hoursToReload;
    }

    /**
     * @param int $hoursToReload
     */
    public function setHoursToReload($hoursToReload)
    {
        $this->hoursToReload = $hoursToReload;
    }

    /**
     * @return boolean
     */
    public function isIsRandom()
    {
        return $this->isRandom;
    }

    /**
     * @param boolean $isRandom
     */
    public function setIsRandom($isRandom)
    {
        $this->isRandom = $isRandom;
    }

}