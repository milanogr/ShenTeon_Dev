<?php

namespace Gdr\GameBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Location
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gdr\GameBundle\Entity\LocationRepository")
 * @UniqueEntity("name")
 * @Vich\Uploadable
 */
class Location
{
    const TYPE_MAP = 1;
    const TYPE_CHAT = 2;
    const TYPE_FORUM_PUBLIC = 3;
    const TYPE_TEON = 6;
    const TYPE_TEON_UNDER = 7;
    const TYPE_HOUSE = 8;
    const TYPE_STREET = 9;

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
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isActive", type="boolean")
     */
    private $isActive = true;

    /**
     * @ORM\Column(name="type", type="integer")
     */
    private $type = Location::TYPE_CHAT;

    /**
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descriptionMap;

    /**
     * @ORM\OneToMany(targetEntity="TagChat", mappedBy="location")
     */
    private $tags;

    /**
     * @ORM\Column(type="boolean")
     */
    private $canRoll = false;

    /**
     * @var \datetime
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="boolean")
     */
    private $allowSoul = false;

    /**
     * @Assert\Image()
     * @Vich\UploadableField(mapping="location_image", fileNameProperty="mapName")
     *
     * @var File $image
     */
    protected $map;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string $imageName
     */
    private $mapName;

    /**
     * @Assert\Image()
     * @Vich\UploadableField(mapping="location_image", fileNameProperty="mapNightName")
     *
     * @var File $image
     */
    protected $mapNight;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string $imageName
     */
    private $mapNightName;

    /**
     * @Assert\Image()
     * @Vich\UploadableField(mapping="location_image", fileNameProperty="iconName")
     *
     * @var File $image
     */
    protected $icon;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string $imageName
     */
    private $iconName;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $iconPosX;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $iconPosY;

    /**
     * @ORM\ManyToOne(targetEntity="Location")
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    private $parentMap;

    /**
     * @ORM\ManyToOne(targetEntity="Gdr\ItemsBundle\Entity\Property")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $property;

    /**
     * @ORM\ManyToOne(targetEntity="Gdr\GameBundle\Entity\Enclave")
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    private $enclave;

    /**
     * @ORM\ManyToOne(targetEntity="Gdr\GameBundle\Entity\Location")
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    private $subChat;

    /**
     * @ORM\Column(type="boolean")
     */
    private $requireKey = false;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isClosed = false;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isStreet = false;

    public function __toString(){
        return (string)$this->getName();
    }

    public function __construct()
    {
        $this->tags = new ArrayCollection();
    }

    /**
     * @return array
     */
    public static function getTypes()
    {
        return array(
            Location::TYPE_MAP => 'Mappa',
            Location::TYPE_CHAT => 'Chat di gioco',
            Location::TYPE_FORUM_PUBLIC => 'Bacheca Pubblica',
            Location::TYPE_TEON => "Mappa di Teon",
            Location::TYPE_TEON_UNDER => "Mappa della Signoria di Teon",
            Location::TYPE_HOUSE => "Appartamento/Casa",
            Location::TYPE_STREET => "Via",
        );
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
     * @return Location
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
     *
     * @return Location
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
     * Set type
     *
     * @param integer $type
     *
     * @return Location
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return integer
     */
    public function getType()
    {
        return $this->type;
    }

    public function getTypeName(){
        return self::getTypes()[$this->getType()];
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Location
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
     * Add tags
     *
     * @param \Gdr\GameBundle\Entity\TagChat $tags
     *
     * @return Location
     */
    public function addTag(\Gdr\GameBundle\Entity\TagChat $tags)
    {
        $this->tags[] = $tags;

        return $this;
    }

    /**
     * @param TagChat $tags
     */
    public function removeTag(\Gdr\GameBundle\Entity\TagChat $tags)
    {
        $this->tags->removeElement($tags);
    }

    /**
     * Get tags
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @return mixed
     */
    public function getCanRoll()
    {
        return $this->canRoll;
    }

    /**
     * @param mixed $canRoll
     */
    public function setCanRoll($canRoll)
    {
        $this->canRoll = $canRoll;
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
    public function getAllowSoul()
    {
        return $this->allowSoul;
    }

    /**
     * @param mixed $allowSoul
     */
    public function setAllowSoul($allowSoul)
    {
        $this->allowSoul = $allowSoul;
    }

    /**
     * @return \Symfony\Component\HttpFoundation\File\File
     */
    public function getMap()
    {
        return $this->map;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\File\File $map
     */
    public function setMap($map)
    {
        $this->map = $map;

        if ($map instanceof UploadedFile) {
            $this->setUpdatedAt(new \DateTime());
        }
    }

    /**
     * @param string $mapName
     */
    public function setMapName($mapName)
    {
        $this->mapName = $mapName;
    }

    /**
     * @return string
     */
    public function getMapName()
    {
        return $this->mapName;
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
     * @param string $iconName
     */
    public function setIconName($iconName)
    {
        $this->iconName = $iconName;
    }

    /**
     * @return string
     */
    public function getIconName()
    {
        return $this->iconName;
    }

    /**
     * @return mixed
     */
    public function getIconPosY()
    {
        return $this->iconPosY;
    }

    /**
     * @param mixed $iconPosY
     */
    public function setIconPosY($iconPosY)
    {
        $this->iconPosY = $iconPosY;
    }

    /**
     * @return mixed
     */
    public function getIconPosX()
    {
        return $this->iconPosX;
    }

    /**
     * @param mixed $iconPosX
     */
    public function setIconPosX($iconPosX)
    {
        $this->iconPosX = $iconPosX;
    }

    /**
     * Set parentMap
     *
     * @param \Gdr\GameBundle\Entity\Location $parentMap
     * @return Location
     */
    public function setParentMap(\Gdr\GameBundle\Entity\Location $parentMap = null)
    {
        $this->parentMap = $parentMap;
    
        return $this;
    }

    /**
     * Get parentMap
     *
     * @return \Gdr\GameBundle\Entity\Location 
     */
    public function getParentMap()
    {
        return $this->parentMap;
    }

    /**
     * @return mixed
     */
    public function getDescriptionMap()
    {
        return $this->descriptionMap;
    }

    /**
     * @param mixed $descriptionMap
     */
    public function setDescriptionMap($descriptionMap)
    {
        $this->descriptionMap = $descriptionMap;
    }

    /**
     * Set property
     *
     * @param \Gdr\ItemsBundle\Entity\Property $property
     * @return Location
     */
    public function setProperty(\Gdr\ItemsBundle\Entity\Property $property = null)
    {
        $this->property = $property;
    
        return $this;
    }

    /**
     * Get property
     *
     * @return \Gdr\ItemsBundle\Entity\Property 
     */
    public function getProperty()
    {
        return $this->property;
    }

    /**
     * @return mixed
     */
    public function getRequireKey()
    {
        return $this->requireKey;
    }

    /**
     * @param mixed $requireKey
     */
    public function setRequireKey($requireKey)
    {
        $this->requireKey = $requireKey;
    }

    /**
     * Set enclave
     *
     * @param \Gdr\GameBundle\Entity\Enclave $enclave
     * @return Location
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
     * @param boolean $isClosed
     */
    public function setIsClosed($isClosed)
    {
        $this->isClosed = $isClosed;
    }

    /**
     * @return boolean
     */
    public function getIsClosed()
    {
        return $this->isClosed;
    }

    /**
     * @param mixed $isStreet
     */
    public function setIsStreet($isStreet)
    {
        $this->isStreet = $isStreet;
    }

    /**
     * @return mixed
     */
    public function getIsStreet()
    {
        return $this->isStreet;
    }

    /**
     * Set subChat
     *
     * @param \Gdr\GameBundle\Entity\Location $subChat
     * @return Location
     */
    public function setSubChat(\Gdr\GameBundle\Entity\Location $subChat = null)
    {
        $this->subChat = $subChat;
    
        return $this;
    }

    /**
     * Get subChat
     *
     * @return \Gdr\GameBundle\Entity\Location 
     */
    public function getSubChat()
    {
        return $this->subChat;
    }

    /**
     * @return \Symfony\Component\HttpFoundation\File\File
     */
    public function getMapNight()
    {
        return $this->mapNight;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\File\File $mapNight
     */
    public function setMapNight($mapNight)
    {
        $this->mapNight = $mapNight;

        if ($mapNight instanceof UploadedFile) {
            $this->setUpdatedAt(new \DateTime());
        }
    }

    /**
     * @return string
     */
    public function getMapNightName()
    {
        return $this->mapNightName;
    }

    /**
     * @param string $mapNightName
     */
    public function setMapNightName($mapNightName)
    {
        $this->mapNightName = $mapNightName;
    }
}
