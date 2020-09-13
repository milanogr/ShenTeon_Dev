<?php

namespace Gdr\ItemsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Property
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gdr\ItemsBundle\Entity\PropertyRepository")
 * @UniqueEntity("name")
 * @Vich\Uploadable
 */
class Property
{
    const TYPE_HOUSE = 1;
    const TYPE_LAND = 2;
    const TYPE_SHOP = 3;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", length=255)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     * @Assert\NotBlank()
     */
    private $name;

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
     * @Assert\Image()
     * @Vich\UploadableField(mapping="location_image", fileNameProperty="chatImageName")
     *
     * @var File $image
     */
    protected $chatImage;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string $imageName
     */
    private $chatImageName;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank()
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, name="imageName")
     * @var string $imageName
     */
    private $imageName;

    /**
     * @ORM\Column(type="integer")
     */
    private $price = 0;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $tax;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $frequencyItems;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $nextProductionAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $nextTaxAt;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $maxPeople;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isActive = true;

    /**
     * @ORM\ManyToOne(targetEntity="Gdr\UserBundle\Entity\Personage")
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    private $owner;

    /**
     * @var \datetime
     *
     * @ORM\Column(type="datetime", nullable=true)
     * @Gedmo\Timestampable(on="create")
     */
    private $createdAt;

    /**
     * @var \datetime
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isTaxNotified = false;

    public function __toString()
    {
        return (string)$this->getName();
    }

    public static function getTypes()
    {
        return array(
            self::TYPE_HOUSE => 'Abitazioni',
            self::TYPE_SHOP => 'Botteghe',
            self::TYPE_LAND => 'Terreni'
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
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
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
     * Set type
     *
     * @param integer $type
     *
     * @return Property
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

    /**
     * @return mixed
     */
    public function getTypeName()
    {
        $types = Property::getTypes();


        return isset($types[$this->getType()]) ? $types[$this->getType()] : null;

    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Property
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
     * Set price
     *
     * @param integer $price
     *
     * @return Property
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
     * @return Property
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
     * Set tax
     *
     * @param integer $tax
     *
     * @return Property
     */
    public function setTax($tax)
    {
        $this->tax = $tax;

        return $this;
    }

    /**
     * Get tax
     *
     * @return integer
     */
    public function getTax()
    {
        return $this->tax;
    }

    /**
     * Set frequencyItems
     *
     * @param integer $frequencyItems
     *
     * @return Property
     */
    public function setFrequencyItems($frequencyItems)
    {
        $this->frequencyItems = $frequencyItems;

        return $this;
    }

    /**
     * Get frequencyItems
     *
     * @return integer
     */
    public function getFrequencyItems()
    {
        return $this->frequencyItems;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return Property
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
     * @return mixed
     */
    public function getMaxPeople()
    {
        return $this->maxPeople;
    }

    /**
     * @param mixed $maxPeople
     */
    public function setMaxPeople($maxPeople)
    {
        $this->maxPeople = $maxPeople;
    }

    /**
     * Set owner
     *
     * @param \Gdr\UserBundle\Entity\Personage $owner
     *
     * @return Property
     */
    public function setOwner(\Gdr\UserBundle\Entity\Personage $owner = null)
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * Get owner
     *
     * @return \Gdr\UserBundle\Entity\Personage
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @return mixed
     */
    public function getNextProductionAt()
    {
        return $this->nextProductionAt;
    }

    /**
     * @param mixed $nextProductionAt
     */
    public function setNextProductionAt($nextProductionAt)
    {
        $this->nextProductionAt = $nextProductionAt;
    }

    /**
     * @return \datetime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \datetime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return mixed
     */
    public function getNextTaxAt()
    {
        return $this->nextTaxAt;
    }

    /**
     * @param mixed $nextTaxAt
     */
    public function setNextTaxAt($nextTaxAt)
    {
        $this->nextTaxAt = $nextTaxAt;
    }

    /**
     * @return mixed
     */
    public function getIsTaxNotified()
    {
        return $this->isTaxNotified;
    }

    /**
     * @param mixed $isTaxNotified
     */
    public function setIsTaxNotified($isTaxNotified)
    {
        $this->isTaxNotified = $isTaxNotified;
    }

    /**
     * @return \Symfony\Component\HttpFoundation\File\File
     */
    public function getChatImage()
    {
        return $this->chatImage;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\File\File $chatImage
     */
    public function setChatImage($chatImage)
    {
        $this->chatImage = $chatImage;

        if ($chatImage instanceof UploadedFile) {
            $this->setUpdatedAt(new \DateTime());
        }
    }

    /**
     * @param string $chatImageName
     */
    public function setChatImageName($chatImageName)
    {
        $this->chatImageName = $chatImageName;
    }

    /**
     * @return string
     */
    public function getChatImageName()
    {
        return $this->chatImageName;
    }
}