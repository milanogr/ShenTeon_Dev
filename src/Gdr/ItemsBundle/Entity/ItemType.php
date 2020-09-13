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
 * Type
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gdr\ItemsBundle\Entity\ItemTypeRepository")
 * @UniqueEntity("name")
 * @Vich\Uploadable
 */
class ItemType
{
    const VESTITI = 'Vestiti';
    const ARMI    = 'Armi';

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
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity="Market", inversedBy="categories")
     * @ORM\JoinTable(name="Categories_Markets")
     */
    private $markets;

    /** @ORM\Column(type="boolean") */
    private $hideFromMarkets = false;

    /** @ORM\Column(type="boolean") */
    private $showInChat = false;

    /**
     * @Assert\Image(
     *     minWidth = 50,
     *     maxWidth = 80,
     *     minHeight = 50,
     *     maxHeight = 80
     * )
     * @Vich\UploadableField(mapping="item_type", fileNameProperty="imageName")
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
     * @var datetime
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

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
     * @return Type
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
        $this->markets = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add markets
     *
     * @param \Gdr\ItemsBundle\Entity\Market $markets
     *
     * @return ItemType
     */
    public function addMarket(\Gdr\ItemsBundle\Entity\Market $markets)
    {
        $this->markets[] = $markets;

        return $this;
    }

    /**
     * Remove markets
     *
     * @param \Gdr\ItemsBundle\Entity\Market $markets
     */
    public function removeMarket(\Gdr\ItemsBundle\Entity\Market $markets)
    {
        $this->markets->removeElement($markets);
    }

    /**
     * Get markets
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMarkets()
    {
        return $this->markets;
    }

    /**
     * @return mixed
     */
    public function getHideFromMarkets()
    {
        return $this->hideFromMarkets;
    }

    /**
     * @param mixed $hideFromMarkets
     */
    public function setHideFromMarkets($hideFromMarkets)
    {
        $this->hideFromMarkets = $hideFromMarkets;
    }

    /**
     * @return mixed
     */
    public function getShowInChat()
    {
        return $this->showInChat;
    }

    /**
     * @param mixed $showInChat
     */
    public function setShowInChat($showInChat)
    {
        $this->showInChat = $showInChat;
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
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
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

}