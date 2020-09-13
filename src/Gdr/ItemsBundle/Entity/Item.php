<?php

namespace Gdr\ItemsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gdr\GameBundle\Entity\Enclave;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Item
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gdr\ItemsBundle\Entity\ItemRepository")
 * @Vich\Uploadable
 */
class Item
{
    const MARKET_EMPORIUM = 1;
    const MARKET_BLACK = 2;
    const MARKET_POTION = 3;

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
     * @ORM\ManyToOne(targetEntity="ItemType", fetch="EAGER")
     * @ORM\JoinColumn(onDelete="SET NULL")
     * @Assert\NotBlank()
     **/
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity="Gdr\GameBundle\Entity\Enclave", fetch="EAGER")
     * @ORM\JoinColumn(onDelete="SET NULL")
     **/
    private $enclave;

    /**
     * @ORM\ManyToOne(targetEntity="Gdr\GameBundle\Entity\Enclave", fetch="EAGER")
     * @ORM\JoinColumn(onDelete="SET NULL")
     **/
    private $clan;

    /**
     * @var string
     *
     * @ORM\Column(name="shortDescription", type="text")
     * @Assert\NotBlank()
     */
    private $shortDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="longDescription", type="text", nullable=true)
     */
    private $longDescription;

    /**
     * @Assert\Image(
     *     minWidth = 80,
     *     maxWidth = 80,
     *     minHeight = 80,
     *     maxHeight = 80
     * )
     * @Vich\UploadableField(mapping="item_image", fileNameProperty="imageName")
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
     * @Assert\Image(
     *     minWidth = 200,
     *     maxWidth = 200,
     *     minHeight = 300,
     *     maxHeight = 300
     * )
     * @Vich\UploadableField(mapping="item_big_image", fileNameProperty="bigImageName")
     *
     * @var File $image
     */
    protected $bigImage;

    /**
     * @ORM\Column(type="string", length=255, name="bigImageName", nullable=true)
     *
     * @var string $imageName
     */
    private $bigImageName;

    /**
     * @Assert\Image(
     *     minWidth = 25,
     *     maxWidth = 25,
     *     minHeight = 25,
     *     maxHeight = 25
     * )
     * @Vich\UploadableField(mapping="item_icon_dress_image", fileNameProperty="dressIconImageName")
     *
     * @var File $image
     */
    protected $dressIconImage;

    /**
     * @ORM\Column(type="string", length=255, name="dressIconImageName", nullable=true)
     *
     * @var string $imageName
     */
    private $dressIconImageName;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isDress", type="boolean")
     */
    private $isDress = false;

    /**
     * @var integer
     *
     * @ORM\Column(name="weight", type="integer")
     * @Assert\NotBlank()
     */
    private $weight = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="durationDays", type="integer", nullable=true)
     */
    private $durationDays;

    /**
     * @var string
     *
     * @ORM\Column(name="activeDescription", type="text", nullable=true)
     */
    private $activeDescription;

    /**
     * @var boolean
     *
     * @ORM\Column(name="showActiveDescription", type="boolean")
     */
    private $showActiveDescription = false;

    /**
     * @var boolean
     *
     * @ORM\Column(name="showExpendableDescription", type="boolean")
     */
    private $showExpendableDescription = false;

    /**
     * @var string
     *
     * @ORM\Column(name="expendableDescription", type="text", nullable=true)
     */
    private $expendableDescription;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isTransferable", type="boolean")
     */
    private $isTransferable = false;

    /**
     *
     * @var boolean
     *
     * @ORM\Column(name="isTransportable", type="boolean")
     */
    private $isTransportable = false;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isDestructible", type="boolean")
     */
    private $isDestructible = false;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isSellable", type="boolean")
     */
    private $isSellable = false;

    // ----- features

    /**
     * @var boolean
     *
     * @ORM\Column(name="canModerateChat", type="boolean")
     */
    private $canModerateChat = false;

    /**
     * @var boolean
     *
     * @ORM\Column(name="canModerateForum", type="boolean")
     */
    private $canModerateForum = false;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     */
    private $canFate = false;

    /**
     * @var integer
     * @ORM\Column(type="integer")
     */
    private $addMana = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="grimoireLevel", type="integer")
     */
    private $grimoireLevel = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="thiefLevel", type="integer")
     */
    private $thiefLevel = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="emporiumLevel", type="integer")
     */
    private $emporiumLevel = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="blackMarketLevel", type="integer")
     */
    private $blackMarketLevel = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="potionMarketLevel", type="integer")
     */
    private $potionMarketLevel = 0;

    /**
     * @ORM\Column(type="boolean")
     */
    private $canAraldo = false;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $canMarry = false;

    /**
     * @ORM\ManyToOne(targetEntity="Gdr\GameBundle\Entity\Location")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $canAccessLocation;

    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    private $grimoryLevel = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="price", type="integer")
     */
    private $price = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantity", type="integer")
     */
    private $quantity = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="level", type="integer")
     */
    private $level = 0;


    /**
     * @var boolean
     *
     * @ORM\Column(name="isResalable", type="boolean")
     */
    private $isResalable = false;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Market")
     */
    private $market;

    /**
     * @var datetime
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @var datetime
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @var boolean
     *
     * @ORM\Column(name="removeOnDeath", type="boolean")
     */
    private $removeOnDeath = false;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     */
    private $isBaseItem = false;

    /**
     * @ORM\ManyToOne(targetEntity="Gdr\GameBundle\Entity\Letter")
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    private $letter;

    public static function getMarketType()
    {
        return array(
            0 => 'Nessun Mercato',
            Item::MARKET_EMPORIUM => 'Emporio',
            Item::MARKET_BLACK => 'Mercato Nero',
            Item::MARKET_POTION => 'Mercato Pozioni'
        );
    }

    public function getMarketName()
    {
        $markets = self::getMarketType();

        if (isset($markets[$this->getId()])){
            return $markets[$this->getId()];
        }else{
            return "-";
        }
    }

    public function __toString()
    {
        return (string) $this->getName() ?? '';
    }

    public static function getLevels()
    {
        return array(0 => 'Nessun Livello', 1, 2, 3, 4, 5);
    }

    public static function getGrimoryLevels()
    {
        return array(0 => 'Nessun Livello', 1, 2, 3, 4, 5, 6);
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
     * @return Item
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
     * Set shortDescription
     *
     * @param string $shortDescription
     *
     * @return Item
     */
    public function setShortDescription($shortDescription)
    {
        $this->shortDescription = $shortDescription;

        return $this;
    }

    /**
     * Get shortDescription
     *
     * @return string
     */
    public function getShortDescription()
    {
        return $this->shortDescription;
    }

    /**
     * Set longDescription
     *
     * @param string $longDescription
     *
     * @return Item
     */
    public function setLongDescription($longDescription)
    {
        $this->longDescription = $longDescription;

        return $this;
    }

    /**
     * Get longDescription
     *
     * @return string
     */
    public function getLongDescription()
    {
        return $this->longDescription;
    }


    /**
     * Set imageName
     *
     * @param string $imageName
     *
     * @return Item
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
     * Set bigImageName
     *
     * @param string $bigImageName
     *
     * @return Item
     */
    public function setBigImageName($bigImageName)
    {
        $this->bigImageName = $bigImageName;

        return $this;
    }

    /**
     * Get bigImageName
     *
     * @return string
     */
    public function getBigImageName()
    {
        return $this->bigImageName;
    }

    /**
     * Set dressIconImageName
     *
     * @param string $dressIconImageName
     *
     * @return Item
     */
    public function setDressIconImageName($dressIconImageName)
    {
        $this->dressIconImageName = $dressIconImageName;

        return $this;
    }

    /**
     * Get dressIconImageName
     *
     * @return string
     */
    public function getDressIconImageName()
    {
        return $this->dressIconImageName;
    }

    /**
     * Set isDress
     *
     * @param boolean $isDress
     *
     * @return Item
     */
    public function setIsDress($isDress)
    {
        $this->isDress = $isDress;

        return $this;
    }

    /**
     * Get isDress
     *
     * @return boolean
     */
    public function getIsDress()
    {
        return $this->isDress;
    }

    /**
     * Set weight
     *
     * @param integer $weight
     *
     * @return Item
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight
     *
     * @return integer
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set durationDays
     *
     * @param integer $durationDays
     *
     * @return Item
     */
    public function setDurationDays($durationDays)
    {
        $this->durationDays = $durationDays;

        return $this;
    }

    /**
     * Get durationDays
     *
     * @return integer
     */
    public function getDurationDays()
    {
        return $this->durationDays;
    }

    /**
     * Set activeDescription
     *
     * @param string $activeDescription
     *
     * @return Item
     */
    public function setActiveDescription($activeDescription)
    {
        $this->activeDescription = $activeDescription;

        return $this;
    }

    /**
     * Get activeDescription
     *
     * @return string
     */
    public function getActiveDescription()
    {
        return $this->activeDescription;
    }

    /**
     * Set showActiveDescription
     *
     * @param boolean $showActiveDescription
     *
     * @return Item
     */
    public function setShowActiveDescription($showActiveDescription)
    {
        $this->showActiveDescription = $showActiveDescription;

        return $this;
    }

    /**
     * Get showActiveDescription
     *
     * @return boolean
     */
    public function getShowActiveDescription()
    {
        return $this->showActiveDescription;
    }

    /**
     * Set showExpendableDescription
     *
     * @param boolean $showExpendableDescription
     *
     * @return Item
     */
    public function setShowExpendableDescription($showExpendableDescription)
    {
        $this->showExpendableDescription = $showExpendableDescription;

        return $this;
    }

    /**
     * Get showExpendableDescription
     *
     * @return boolean
     */
    public function getShowExpendableDescription()
    {
        return $this->showExpendableDescription;
    }

    /**
     * Set expendableDescription
     *
     * @param string $expendableDescription
     *
     * @return Item
     */
    public function setExpendableDescription($expendableDescription)
    {
        $this->expendableDescription = $expendableDescription;

        return $this;
    }

    /**
     * Get expendableDescription
     *
     * @return string
     */
    public function getExpendableDescription()
    {
        return $this->expendableDescription;
    }

    /**
     * Set isTransferable
     *
     * @param boolean $isTransferable
     *
     * @return Item
     */
    public function setIsTransferable($isTransferable)
    {
        $this->isTransferable = $isTransferable;

        return $this;
    }

    /**
     * Get isTransferable
     *
     * @return boolean
     */
    public function getIsTransferable()
    {
        return $this->isTransferable;
    }

    /**
     * Set isTransportable
     *
     * @param boolean $isTransportable
     *
     * @return Item
     */
    public function setIsTransportable($isTransportable)
    {
        $this->isTransportable = $isTransportable;

        return $this;
    }

    /**
     * Get isTransportable
     *
     * @return boolean
     */
    public function getIsTransportable()
    {
        return $this->isTransportable;
    }

    /**
     * Set isDestructible
     *
     * @param boolean $isDestructible
     *
     * @return Item
     */
    public function setIsDestructible($isDestructible)
    {
        $this->isDestructible = $isDestructible;

        return $this;
    }

    /**
     * Get isDestructible
     *
     * @return boolean
     */
    public function getIsDestructible()
    {
        return $this->isDestructible;
    }

    /**
     * Set isSellable
     *
     * @param boolean $isSellable
     *
     * @return Item
     */
    public function setIsSellable($isSellable)
    {
        $this->isSellable = $isSellable;

        return $this;
    }

    /**
     * Get isSellable
     *
     * @return boolean
     */
    public function getIsSellable()
    {
        return $this->isSellable;
    }

    /**
     * Set canModerateChat
     *
     * @param boolean $canModerateChat
     *
     * @return Item
     */
    public function setCanModerateChat($canModerateChat)
    {
        $this->canModerateChat = $canModerateChat;

        return $this;
    }

    /**
     * Get canModerateChat
     *
     * @return boolean
     */
    public function getCanModerateChat()
    {
        return $this->canModerateChat;
    }

    /**
     * Set canModerateForum
     *
     * @param boolean $canModerateForum
     *
     * @return Item
     */
    public function setCanModerateForum($canModerateForum)
    {
        $this->canModerateForum = $canModerateForum;

        return $this;
    }

    /**
     * Get canModerateForum
     *
     * @return boolean
     */
    public function getCanModerateForum()
    {
        return $this->canModerateForum;
    }

    /**
     * Set grimoireLevel
     *
     * @param integer $grimoireLevel
     *
     * @return Item
     */
    public function setGrimoireLevel($grimoireLevel)
    {
        $this->grimoireLevel = $grimoireLevel;

        return $this;
    }

    /**
     * Get grimoireLevel
     *
     * @return integer
     */
    public function getGrimoireLevel()
    {
        return $this->grimoireLevel;
    }

    /**
     * Set thiefLevel
     *
     * @param integer $thiefLevel
     *
     * @return Item
     */
    public function setThiefLevel($thiefLevel)
    {
        $this->thiefLevel = $thiefLevel;

        return $this;
    }

    /**
     * Get thiefLevel
     *
     * @return integer
     */
    public function getThiefLevel()
    {
        return $this->thiefLevel;
    }

    /**
     * Set emporiumLevel
     *
     * @param integer $emporiumLevel
     *
     * @return Item
     */
    public function setEmporiumLevel($emporiumLevel)
    {
        $this->emporiumLevel = $emporiumLevel;

        return $this;
    }

    /**
     * Get emporiumLevel
     *
     * @return integer
     */
    public function getEmporiumLevel()
    {
        return $this->emporiumLevel;
    }

    /**
     * Set blackMarketLevel
     *
     * @param integer $blackMarketLevel
     *
     * @return Item
     */
    public function setBlackMarketLevel($blackMarketLevel)
    {
        $this->blackMarketLevel = $blackMarketLevel;

        return $this;
    }

    /**
     * Get blackMarketLevel
     *
     * @return integer
     */
    public function getBlackMarketLevel()
    {
        return $this->blackMarketLevel;
    }

    /**
     * Set canEditAge
     *
     * @param boolean $canEditAge
     *
     * @return Item
     */
    public function setCanEditAge($canEditAge)
    {
        $this->canEditAge = $canEditAge;

        return $this;
    }

    /**
     * Get canEditAge
     *
     * @return boolean
     */
    public function getCanEditAge()
    {
        return $this->canEditAge;
    }

    /**
     * Set canEditGenter
     *
     * @param boolean $canEditGenter
     *
     * @return Item
     */
    public function setCanEditGenter($canEditGenter)
    {
        $this->canEditGenter = $canEditGenter;

        return $this;
    }

    /**
     * Get canEditGenter
     *
     * @return boolean
     */
    public function getCanEditGenter()
    {
        return $this->canEditGenter;
    }

    /**
     * Set canEditPhisical
     *
     * @param boolean $canEditPhisical
     *
     * @return Item
     */
    public function setCanEditPhisical($canEditPhisical)
    {
        $this->canEditPhisical = $canEditPhisical;

        return $this;
    }

    /**
     * Get canEditPhisical
     *
     * @return boolean
     */
    public function getCanEditPhisical()
    {
        return $this->canEditPhisical;
    }

    /**
     * Set canAnonymous
     *
     * @param boolean $canAnonymous
     *
     * @return Item
     */
    public function setCanAnonymous($canAnonymous)
    {
        $this->canAnonymous = $canAnonymous;

        return $this;
    }

    /**
     * Get canAnonymous
     *
     * @return boolean
     */
    public function getCanAnonymous()
    {
        return $this->canAnonymous;
    }

    /**
     * Set canHelpMaster
     *
     * @param boolean $canHelpMaster
     *
     * @return Item
     */
    public function setCanHelpMaster($canHelpMaster)
    {
        $this->canHelpMaster = $canHelpMaster;

        return $this;
    }

    /**
     * Get canHelpMaster
     *
     * @return boolean
     */
    public function getCanHelpMaster()
    {
        return $this->canHelpMaster;
    }

    /**
     * Set canMentor
     *
     * @param boolean $canMentor
     *
     * @return Item
     */
    public function setCanMentor($canMentor)
    {
        $this->canMentor = $canMentor;

        return $this;
    }

    /**
     * Get canMentor
     *
     * @return boolean
     */
    public function getCanMentor()
    {
        return $this->canMentor;
    }

    /**
     * Set price
     *
     * @param integer $price
     *
     * @return Item
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return integer
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     *
     * @return Item
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set level
     *
     * @param integer $level
     *
     * @return Item
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
     * Set isResalable
     *
     * @param boolean $isResalable
     *
     * @return Item
     */
    public function setIsResalable($isResalable)
    {
        $this->isResalable = $isResalable;

        return $this;
    }

    /**
     * Get isResalable
     *
     * @return boolean
     */
    public function getIsResalable()
    {
        return $this->isResalable;
    }


    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Item
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Item
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
     * Set type
     *
     * @param \Gdr\ItemsBundle\Entity\ItemType $type
     *
     * @return Item
     */
    public function setType(\Gdr\ItemsBundle\Entity\ItemType $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \Gdr\ItemsBundle\Entity\ItemType
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set newRace
     *
     * @param \Gdr\RaceBundle\Entity\Race $newRace
     *
     * @return Item
     */
    public function setNewRace(\Gdr\RaceBundle\Entity\Race $newRace = null)
    {
        $this->newRace = $newRace;

        return $this;
    }

    /**
     * Get newRace
     *
     * @return \Gdr\RaceBundle\Entity\Race
     */
    public function getNewRace()
    {
        return $this->newRace;
    }

    /**
     * @return \Symfony\Component\HttpFoundation\File\File
     */
    public function getImage()
    {
        return $this->image;
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
    public function getBigImage()
    {
        return $this->bigImage;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\File\File $bigImage
     */
    public function setBigImage($bigImage)
    {
        $this->bigImage = $bigImage;

        if ($bigImage instanceof UploadedFile) {
            $this->setUpdatedAt(new \DateTime());
        }
    }

    /**
     * @return \Symfony\Component\HttpFoundation\File\File
     */
    public function getDressIconImage()
    {
        return $this->dressIconImage;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\File\File $dressIconImage
     */
    public function setDressIconImage($dressIconImage)
    {
        $this->dressIconImage = $dressIconImage;

        if ($dressIconImage instanceof UploadedFile) {
            $this->setUpdatedAt(new \DateTime());
        }
    }

    /**
     * @return int
     */
    public function getPotionMarketLevel()
    {
        return $this->potionMarketLevel;
    }

    /**
     * @param int $potionMarketLevel
     */
    public function setPotionMarketLevel($potionMarketLevel)
    {
        $this->potionMarketLevel = $potionMarketLevel;
    }

    /**
     * Set market
     *
     * @param \Gdr\ItemsBundle\Entity\Market $market
     *
     * @return Item
     */
    public function setMarket(\Gdr\ItemsBundle\Entity\Market $market = null)
    {
        $this->market = $market;

        return $this;
    }

    /**
     * Get market
     *
     * @return \Gdr\ItemsBundle\Entity\Market
     */
    public function getMarket()
    {
        return $this->market;
    }

    /**
     * @return boolean
     */
    public function getCanFate()
    {
        return $this->canFate;
    }

    /**
     * @param boolean $canFate
     */
    public function setCanFate($canFate)
    {
        $this->canFate = $canFate;
    }

    /**
     * @return int
     */
    public function getGrimoryLevel()
    {
        return $this->grimoryLevel;
    }

    /**
     * @param int $grimoryLevel
     */
    public function setGrimoryLevel($grimoryLevel)
    {
        $this->grimoryLevel = $grimoryLevel;
    }

    /**
     * @return int
     */
    public function getAddMana()
    {
        return $this->addMana;
    }

    /**
     * @param int $addMana
     */
    public function setAddMana($addMana)
    {
        $this->addMana = $addMana;
    }

    /**
     * @return mixed
     */
    public function getCanAraldo()
    {
        return $this->canAraldo;
    }

    /**
     * @param mixed $canAraldo
     */
    public function setCanAraldo($canAraldo)
    {
        $this->canAraldo = $canAraldo;
    }

    /**
     * Set canAccessLocation
     *
     * @param \Gdr\GameBundle\Entity\Location $canAccessLocation
     * @return Item
     */
    public function setCanAccessLocation(\Gdr\GameBundle\Entity\Location $canAccessLocation = null)
    {
        $this->canAccessLocation = $canAccessLocation;
    
        return $this;
    }

    /**
     * Get canAccessLocation
     *
     * @return \Gdr\GameBundle\Entity\Location 
     */
    public function getCanAccessLocation()
    {
        return $this->canAccessLocation;
    }

    /**
     * Set removeOnDeath
     *
     * @param boolean $removeOnDeath
     * @return Item
     */
    public function setRemoveOnDeath($removeOnDeath)
    {
        $this->removeOnDeath = $removeOnDeath;
    
        return $this;
    }

    /**
     * Get removeOnDeath
     *
     * @return boolean 
     */
    public function getRemoveOnDeath()
    {
        return $this->removeOnDeath;
    }

    /**
     * Set canMarry
     *
     * @param boolean $canMarry
     * @return Item
     */
    public function setCanMarry($canMarry)
    {
        $this->canMarry = $canMarry;
    
        return $this;
    }

    /**
     * Get canMarry
     *
     * @return boolean 
     */
    public function getCanMarry()
    {
        return $this->canMarry;
    }

    /**
     * @return boolean
     */
    public function getIsBaseItem()
    {
        return $this->isBaseItem;
    }

    /**
     * @param boolean $isBaseItem
     */
    public function setIsBaseItem($isBaseItem)
    {
        $this->isBaseItem = $isBaseItem;
    }

    /**
     * Set letter
     *
     * @param \Gdr\GameBundle\Entity\Letter $letter
     * @return Item
     */
    public function setLetter(\Gdr\GameBundle\Entity\Letter $letter = null)
    {
        $this->letter = $letter;
    
        return $this;
    }

    /**
     * Get letter
     *
     * @return \Gdr\GameBundle\Entity\Letter 
     */
    public function getLetter()
    {
        return $this->letter;
    }

    /**
     * @return mixed
     */
    public function getEnclave()
    {
        return $this->enclave;
    }

    /**
     * @param mixed $enclave
     */
    public function setEnclave(Enclave $enclave = null)
    {
        $this->enclave = $enclave;
    }

    /**
     * @return mixed
     */
    public function getClan()
    {
        return $this->clan;
    }

    /**
     * @param mixed $clan
     */
    public function setClan(Enclave $clan)
    {
        $this->clan = $clan;
    }
}