<?php

namespace Gdr\RaceBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Race
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gdr\RaceBundle\Entity\RaceRepository")
 * @Vich\Uploadable
 */
class Race
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
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="public_name", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $publicName;

    /**
     * @var string
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="ageMin", type="integer")
     */
    private $ageMin;

    /**
     * @var integer
     *
     * @ORM\Column(name="ageMax", type="integer")
     */
    private $ageMax;

    /**
     * @var integer
     *
     * @ORM\Column(name="ageDeath", type="integer")
     */
    private $ageDeath;

    /**
     * @var integer
     *
     * @ORM\Column(name="maxStrength", type="integer", nullable=true)
     */
    private $maxStrength;

    /**
     * @var integer
     *
     * @ORM\Column(name="maxWisdom", type="integer", nullable=true)
     */
    private $maxWisdom;

    /**
     * @var integer
     *
     * @ORM\Column(name="minHeight", type="integer")
     */
    private $minHeight;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     */
    private $maxHeight;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     */
    private $minWeight;

    /**
     * @var integer
     *
     * @ORM\Column(name="maxWeight", type="integer")
     */
    private $maxWeight;

    /**
     * @Assert\Image(
     *     minWidth = 15,
     *     maxWidth = 15,
     *     minHeight = 15,
     *     maxHeight = 15
     * )
     * @Vich\UploadableField(mapping="race_icon_male", fileNameProperty="maleIconName")
     *
     * @var File $maleIcon
     */
    protected $maleIcon;

    /**
     * @ORM\Column(type="string", length=255, name="maleIconName", nullable=true)
     *
     * @var string $maleIconName
     */
    private $maleIconName;

    /**
     * @Assert\Image(
     *     minWidth = 15,
     *     maxWidth = 15,
     *     minHeight = 15,
     *     maxHeight = 15
     * )
     * @Vich\UploadableField(mapping="race_icon_female", fileNameProperty="femaleIconName")
     *
     * @var File $femaleIcon
     */
    protected $femaleIcon;

    /**
     * @ORM\Column(type="string", length=255, name="femaleIconName", nullable=true)
     *
     * @var string $femaleIconName
     */
    private $femaleIconName;

    /**
     * @Assert\Image()
     * @Vich\UploadableField(mapping="race_default_image", fileNameProperty="maleImageName")
     *
     * @var File $maleImage
     */
    protected $maleImage;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     * @var string $maleImageName
     */
    private $maleImageName;

    /**
     * @Assert\Image()
     * @Vich\UploadableField(mapping="race_default_image", fileNameProperty="femaleImageName")
     *
     * @var File $defaultImage
     */
    protected $femaleImage;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     * @var string $defaultImageName
     */
    private $femaleImageName;

    /**
     * @var bool
     *
     * @ORM\Column(type="boolean")
     */
    private $isActive = true;

    /**
     * @ORM\ManyToMany(targetEntity="EyeColor", inversedBy="races")
     * @ORM\JoinTable(name="Race_EyeColor",
     *      joinColumns={@ORM\JoinColumn(name="race_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="eyeColor_id", referencedColumnName="id")}
     *      )
     **/
    private $eyeColors;

    /**
     * @ORM\ManyToMany(targetEntity="HairColor", inversedBy="races")
     * @ORM\JoinTable(name="Race_HairColor",
     *      joinColumns={@ORM\JoinColumn(name="race_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="hairColor_id", referencedColumnName="id")}
     *      )
     **/
    private $hairColors;

    /**
     * @ORM\ManyToMany(targetEntity="SkinColor", inversedBy="races")
     * @ORM\JoinTable(name="Race_SkinColor",
     *      joinColumns={@ORM\JoinColumn(name="race_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="skinColor_id", referencedColumnName="id")}
     *      )
     **/
    private $skinColors;

    /**
     * @ORM\ManyToMany(targetEntity="FurColor", inversedBy="races")
     * @ORM\JoinTable(name="Race_FurColor",
     *      joinColumns={@ORM\JoinColumn(name="race_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="furColor_id", referencedColumnName="id")}
     *      )
     **/
    private $furColors;

    /**
     * @ORM\ManyToMany(targetEntity="SquamaColor", inversedBy="races")
     * @ORM\JoinTable(name="Race_SquamaColor",
     *      joinColumns={@ORM\JoinColumn(name="race_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="squamaColor_id", referencedColumnName="id")}
     *      )
     **/
    private $squamaColors;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updatedAt", type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="integer")
     */
    private $monthToOlder = 1;

    /**
     * @Assert\Image(
     *     minWidth = 15,
     *     maxWidth = 15,
     *     minHeight = 15,
     *     maxHeight = 15
     * )
     * @Vich\UploadableField(mapping="race_icon_male", fileNameProperty="maleRealIconName")
     *
     * @var File $maleIcon
     */
    protected $maleRealIcon;

    /**
     * @ORM\Column(type="string", length=255, name="maleRealIconName", nullable=true)
     *
     * @var string $maleIconName
     */
    private $maleRealIconName;

    /**
     * @Assert\Image(
     *     minWidth = 15,
     *     maxWidth = 15,
     *     minHeight = 15,
     *     maxHeight = 15
     * )
     * @Vich\UploadableField(mapping="race_icon_female", fileNameProperty="femaleRealIconName")
     *
     * @var File $femaleIcon
     */
    protected $femaleRealIcon;

    /**
     * @ORM\Column(type="string", length=255, name="femaleRealIconName", nullable=true)
     *
     * @var string $femaleIconName
     */
    private $femaleRealIconName;

    /**
     * @ORM\Column(type="boolean")
     */
    private $useRaceLanguage = false;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isWerewolf = false;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isVampire = false;

    /**
     * @var bool
     *
     * @ORM\Column(type="boolean")
     */
    private $isKillableRandomly = true;

    /**
     * @return string
     */
    public function __toString()
    {
        return (string)$this->name . " (" . $this->getId() . ")";
    }

    public function __construct()
    {
        $this->isActive = true;
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
     * @return Race
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
     * Set ageMin
     *
     * @param integer $ageMin
     *
     * @return Race
     */
    public function setAgeMin($ageMin)
    {
        $this->ageMin = $ageMin;

        return $this;
    }

    /**
     * Get ageMin
     *
     * @return integer
     */
    public function getAgeMin()
    {
        return $this->ageMin;
    }

    /**
     * Set ageMax
     *
     * @param integer $ageMax
     *
     * @return Race
     */
    public function setAgeMax($ageMax)
    {
        $this->ageMax = $ageMax;

        return $this;
    }

    /**
     * Get ageMax
     *
     * @return integer
     */
    public function getAgeMax()
    {
        return $this->ageMax;
    }

    /**
     * Set ageDeath
     *
     * @param integer $ageDeath
     *
     * @return Race
     */
    public function setAgeDeath($ageDeath)
    {
        $this->ageDeath = $ageDeath;

        return $this;
    }

    /**
     * Get ageDeath
     *
     * @return integer
     */
    public function getAgeDeath()
    {
        return $this->ageDeath;
    }

    /**
     * Set maxStrength
     *
     * @param integer $maxStrength
     *
     * @return Race
     */
    public function setMaxStrength($maxStrength)
    {
        $this->maxStrength = $maxStrength;

        return $this;
    }

    /**
     * Get maxStrength
     *
     * @return integer
     */
    public function getMaxStrength()
    {
        return $this->maxStrength;
    }

    /**
     * Set maxWisdom
     *
     * @param integer $maxWisdom
     *
     * @return Race
     */
    public function setMaxWisdom($maxWisdom)
    {
        $this->maxWisdom = $maxWisdom;

        return $this;
    }

    /**
     * Get maxWisdom
     *
     * @return integer
     */
    public function getMaxWisdom()
    {
        return $this->maxWisdom;
    }

    /**
     * Set minHeight
     *
     * @param integer $minHeight
     *
     * @return Race
     */
    public function setMinHeight($minHeight)
    {
        $this->minHeight = $minHeight;

        return $this;
    }

    /**
     * Get minHeight
     *
     * @return integer
     */
    public function getMinHeight()
    {
        return $this->minHeight;
    }

    /**
     * Set maxHeight
     *
     * @param integer $maxHeight
     *
     * @return Race
     */
    public function setMaxHeight($maxHeight)
    {
        $this->maxHeight = $maxHeight;

        return $this;
    }

    /**
     * Get maxHeight
     *
     * @return integer
     */
    public function getMaxHeight()
    {
        return $this->maxHeight;
    }

    /**
     * Set minWeight
     *
     * @param integer $minWeight
     *
     * @return Race
     */
    public function setMinWeight($minWeight)
    {
        $this->minWeight = $minWeight;

        return $this;
    }

    /**
     * Get minWeight
     *
     * @return integer
     */
    public function getMinWeight()
    {
        return $this->minWeight;
    }

    /**
     * Set maxWeight
     *
     * @param integer $maxWeight
     *
     * @return Race
     */
    public function setMaxWeight($maxWeight)
    {
        $this->maxWeight = $maxWeight;

        return $this;
    }

    /**
     * Get maxWeight
     *
     * @return integer
     */
    public function getMaxWeight()
    {
        return $this->maxWeight;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return Race
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
     * @return \Symfony\Component\HttpFoundation\File\File
     */
    public function getMaleIcon()
    {
        return $this->maleIcon;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\File\File $maleIcon
     */
    public function setMaleIcon($maleIcon)
    {
        $this->maleIcon = $maleIcon;

        if ($maleIcon instanceof UploadedFile) {
            $this->setUpdatedAt(new \DateTime());
        }
    }

    /**
     * @return string
     */
    public function getMaleIconName()
    {
        return $this->maleIconName;
    }

    /**
     * @param string $maleIconName
     */
    public function setMaleIconName($maleIconName)
    {
        $this->maleIconName = $maleIconName;
    }

    /**
     * @return \Symfony\Component\HttpFoundation\File\File
     */
    public function getFemaleIcon()
    {
        return $this->femaleIcon;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\File\File $femaleIcon
     */
    public function setFemaleIcon($femaleIcon)
    {
        $this->femaleIcon = $femaleIcon;

        if ($femaleIcon instanceof UploadedFile) {
            $this->setUpdatedAt(new \DateTime());
        }
    }

    /**
     * @return string
     */
    public function getFemaleIconName()
    {
        return $this->femaleIconName;
    }

    /**
     * @param string $femaleIconName
     */
    public function setFemaleIconName($femaleIconName)
    {
        $this->femaleIconName = $femaleIconName;
    }

    /**
     * @return string
     */
    public function getBigImageName()
    {
        return $this->bigImageName;
    }

    /**
     * @param string $bigImageName
     */
    public function setBigImageName($bigImageName)
    {
        $this->bigImageName = $bigImageName;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Add eyeColors
     *
     * @param \Gdr\RaceBundle\Entity\EyeColor $eyeColors
     *
     * @return Race
     */
    public function addEyeColor(\Gdr\RaceBundle\Entity\EyeColor $eyeColors)
    {
        $this->eyeColors[] = $eyeColors;

        return $this;
    }

    /**
     * Remove eyeColors
     *
     * @param \Gdr\RaceBundle\Entity\EyeColor $eyeColors
     */
    public function removeEyeColor(\Gdr\RaceBundle\Entity\EyeColor $eyeColors)
    {
        $this->eyeColors->removeElement($eyeColors);
    }

    /**
     * Get eyeColors
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEyeColors()
    {
        return $this->eyeColors;
    }

    /**
     * Add hairColors
     *
     * @param \Gdr\RaceBundle\Entity\HairColor $hairColors
     *
     * @return Race
     */
    public function addHairColor(\Gdr\RaceBundle\Entity\HairColor $hairColors)
    {
        $this->hairColors[] = $hairColors;

        return $this;
    }

    /**
     * Remove hairColors
     *
     * @param \Gdr\RaceBundle\Entity\HairColor $hairColors
     */
    public function removeHairColor(\Gdr\RaceBundle\Entity\HairColor $hairColors)
    {
        $this->hairColors->removeElement($hairColors);
    }

    /**
     * Get hairColors
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getHairColors()
    {
        return $this->hairColors;
    }

    /**
     * Add skinColors
     *
     * @param \Gdr\RaceBundle\Entity\SkinColor $skinColors
     *
     * @return Race
     */
    public function addSkinColor(\Gdr\RaceBundle\Entity\SkinColor $skinColors)
    {
        $this->skinColors[] = $skinColors;

        return $this;
    }

    /**
     * Remove skinColors
     *
     * @param \Gdr\RaceBundle\Entity\SkinColor $skinColors
     */
    public function removeSkinColor(\Gdr\RaceBundle\Entity\SkinColor $skinColors)
    {
        $this->skinColors->removeElement($skinColors);
    }

    /**
     * Get skinColors
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSkinColors()
    {
        return $this->skinColors;
    }

    /**
     * Add furColors
     *
     * @param \Gdr\RaceBundle\Entity\FurColor $furColors
     *
     * @return Race
     */
    public function addFurColor(\Gdr\RaceBundle\Entity\FurColor $furColors)
    {
        $this->furColors[] = $furColors;

        return $this;
    }

    /**
     * Remove furColors
     *
     * @param \Gdr\RaceBundle\Entity\FurColor $furColors
     */
    public function removeFurColor(\Gdr\RaceBundle\Entity\FurColor $furColors)
    {
        $this->furColors->removeElement($furColors);
    }

    /**
     * Get furColors
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFurColors()
    {
        return $this->furColors;
    }

    /**
     * Add squamaColors
     *
     * @param \Gdr\RaceBundle\Entity\SquamaColor $squamaColors
     *
     * @return Race
     */
    public function addSquamaColor(\Gdr\RaceBundle\Entity\SquamaColor $squamaColors)
    {
        $this->squamaColors[] = $squamaColors;

        return $this;
    }

    /**
     * Remove squamaColors
     *
     * @param \Gdr\RaceBundle\Entity\SquamaColor $squamaColors
     */
    public function removeSquamaColor(\Gdr\RaceBundle\Entity\SquamaColor $squamaColors)
    {
        $this->squamaColors->removeElement($squamaColors);
    }

    /**
     * Get squamaColors
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSquamaColors()
    {
        return $this->squamaColors;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return \Symfony\Component\HttpFoundation\File\File
     */
    public function getFemaleImage()
    {
        return $this->femaleImage;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\File\File $femaleImage
     */
    public function setFemaleImage($femaleImage)
    {
        $this->femaleImage = $femaleImage;

        if ($femaleImage instanceof UploadedFile) {
            $this->setUpdatedAt(new \DateTime());
        }
    }

    /**
     * @return string
     */
    public function getFemaleImageName()
    {
        return $this->femaleImageName;
    }

    /**
     * @param string $femaleImageName
     */
    public function setFemaleImageName($femaleImageName)
    {
        $this->femaleImageName = $femaleImageName;
    }

    /**
     * @return string
     */
    public function getMaleImageName()
    {
        return $this->maleImageName;
    }

    /**
     * @param string $maleImageName
     */
    public function setMaleImageName($maleImageName)
    {
        $this->maleImageName = $maleImageName;
    }

    /**
     * @return \Symfony\Component\HttpFoundation\File\File
     */
    public function getMaleImage()
    {
        return $this->maleImage;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\File\File $maleImage
     */
    public function setMaleImage($maleImage)
    {
        $this->maleImage = $maleImage;

        if ($maleImage instanceof UploadedFile) {
            $this->setUpdatedAt(new \DateTime());
        }
    }

    /**
     * @return mixed
     */
    public function getMonthToOlder()
    {
        return $this->monthToOlder;
    }

    /**
     * @param mixed $monthToOlder
     */
    public function setMonthToOlder($monthToOlder)
    {
        $this->monthToOlder = $monthToOlder;
    }

    /**
     * @return string
     */
    public function getMaleRealIconName()
    {
        return $this->maleRealIconName;
    }

    /**
     * @param string $maleRealIconName
     */
    public function setMaleRealIconName($maleRealIconName)
    {
        $this->maleRealIconName = $maleRealIconName;
    }

    /**
     * @return string
     */
    public function getFemaleRealIconName()
    {
        return $this->femaleRealIconName;
    }

    /**
     * @param string $femaleRealIconName
     */
    public function setFemaleRealIconName($femaleRealIconName)
    {
        $this->femaleRealIconName = $femaleRealIconName;
    }

    /**
     * @return \Symfony\Component\HttpFoundation\File\File
     */
    public function getFemaleRealIcon()
    {
        return $this->femaleRealIcon;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\File\File $femaleRealIcon
     */
    public function setFemaleRealIcon($femaleRealIcon)
    {
        $this->femaleRealIcon = $femaleRealIcon;

        if ($femaleRealIcon instanceof UploadedFile) {
            $this->setUpdatedAt(new \DateTime());
        }
    }

    /**
     * @return \Symfony\Component\HttpFoundation\File\File
     */
    public function getMaleRealIcon()
    {
        return $this->maleRealIcon;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\File\File $maleRealIcon
     */
    public function setMaleRealIcon($maleRealIcon)
    {
        $this->maleRealIcon = $maleRealIcon;

        if ($maleRealIcon instanceof UploadedFile) {
            $this->setUpdatedAt(new \DateTime());
        }
    }

    /**
     * @return boolean
     */
    public function getUseRaceLanguage()
    {
        return $this->useRaceLanguage;
    }

    /**
     * @param boolean $useRaceLanguage
     */
    public function setUseRaceLanguage($useRaceLanguage)
    {
        $this->useRaceLanguage = $useRaceLanguage;
    }

    /**
     * @return mixed
     */
    public function getIsWerewolf()
    {
        return $this->isWerewolf;
    }

    /**
     * @param mixed $isWerewolf
     */
    public function setIsWerewolf($isWerewolf)
    {
        $this->isWerewolf = $isWerewolf;
    }

    /**
     * @return mixed
     */
    public function getIsVampire()
    {
        return $this->isVampire;
    }

    /**
     * @param mixed $isVampire
     */
    public function setIsVampire($isVampire)
    {
        $this->isVampire = $isVampire;
    }

    /**
     * @return boolean
     */
    public function isKillableRandomly()
    {
        return $this->isKillableRandomly;
    }

    /**
     * @param boolean $isKillableRandomly
     */
    public function setIsKillableRandomly($isKillableRandomly)
    {
        $this->isKillableRandomly = $isKillableRandomly;
    }

    /**
     * @return string
     */
    public function getPublicName()
    {
        return $this->publicName != '' ? $this->publicName : $this->name;
    }

    /**
     * @param string $publicName
     */
    public function setPublicName($publicName)
    {
        $this->publicName = $publicName;
    }
}