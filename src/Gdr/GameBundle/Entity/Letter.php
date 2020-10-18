<?php

namespace Gdr\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;
use Gdr\GameBundle\Validator\Constraint as GdrAssert;

/**
 * Letter
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gdr\GameBundle\Entity\LetterRepository")
 */
class Letter
{
    const ACTION_NEW = 1;
    const ACTION_REPLY = 2;
    const ACTION_INOLTRA = 3;

    const CATEGORY_ON = 0;
    const CATEGORY_OFF = 1;
    const CATEGORY_ORG = 2;

    const GROUP_ALL = 1;
    const GROUP_ENCLAVE = 2;
    const GROUP_CLAN = 3;
    const GROUP_MOD = 4;
    const GROUP_FATE = 5;
    const GROUP_ONLINE = 6;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $category = Letter::CATEGORY_ON;

    /**
     * @var string
     *
     * @ORM\Column(name="senderName", type="string", length=255)
     */
    private $senderName;

    /**
     * @var string
     *
     * @ORM\Column(name="body", type="text")
     * @Assert\NotBlank(message="Il messaggio non può essere vuoto")
     */
    private $body;

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $oldBody;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isRead", type="boolean", nullable=true)
     */
    private $isRead = false;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isDeleted", type="boolean", nullable=true)
     */
    private $isDeleted = false;

    /**
     * @ORM\ManyToOne(targetEntity="Gdr\UserBundle\Entity\Personage")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $sender;

    /**
     * @ORM\ManyToOne(targetEntity="Gdr\UserBundle\Entity\Personage")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $receiver;

    /**
     * Serve solo per il form.
     */
    private $receiverName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $senderLevelIcon;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $senderRankName;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $senderRaceIcon;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $senderRaceName;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isForward = false;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     */
    private $nameAsAdmin = false;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     */
    private $nameAsMod = false;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     */
    private $nameAsFate = false;

    /**
     * @ORM\ManyToOne(targetEntity="Gdr\GameBundle\Entity\LetterBackground")
     * @ORM\JoinColumn(onDelete="SET NULL")
     * @GdrAssert\EnoughMoney()
     */
    private $background;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $special;

    public function __toString(){
        return (string) $this->getSenderName().$this->getId();
    }

    public static function getCategories(){
        return array(
            Letter::CATEGORY_ON => 'ON',
            Letter::CATEGORY_OFF => 'OFF',
            Letter::CATEGORY_ORG => 'ORG'
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
     * Set senderName
     *
     * @param string $senderName
     * @return Letter
     */
    public function setSenderName($senderName)
    {
        $this->senderName = $senderName;
    
        return $this;
    }

    /**
     * Get senderName
     *
     * @return string 
     */
    public function getSenderName()
    {
        return $this->senderName;
    }

    /**
     * Set body
     *
     * @param string $body
     * @return Letter
     */
    public function setBody($body)
    {
        $this->body = $body;
    
        return $this;
    }

    /**
     * Get body
     *
     * @return string 
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set isRead
     *
     * @param boolean $isRead
     * @return Letter
     */
    public function setIsRead($isRead)
    {
        $this->isRead = $isRead;
    
        return $this;
    }

    /**
     * Get isRead
     *
     * @return boolean 
     */
    public function getIsRead()
    {
        return $this->isRead;
    }

    /**
     * Set isDeleted
     *
     * @param boolean $isDeleted
     * @return Letter
     */
    public function setIsDeleted($isDeleted)
    {
        $this->isDeleted = $isDeleted;
    
        return $this;
    }

    /**
     * Get isDeleted
     *
     * @return boolean 
     */
    public function getIsDeleted()
    {
        return $this->isDeleted;
    }

    /**
     * Set sender
     *
     * @param \Gdr\UserBundle\Entity\Personage $sender
     * @return Letter
     */
    public function setSender(\Gdr\UserBundle\Entity\Personage $sender = null)
    {
        $this->sender = $sender;
    
        return $this;
    }

    /**
     * Get sender
     *
     * @return \Gdr\UserBundle\Entity\Personage 
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * Set receiver
     *
     * @param \Gdr\UserBundle\Entity\Personage $receiver
     * @return Letter
     */
    public function setReceiver(\Gdr\UserBundle\Entity\Personage $receiver = null)
    {
        $this->receiver = $receiver;
    
        return $this;
    }

    /**
     * Get receiver
     *
     * @return \Gdr\UserBundle\Entity\Personage 
     */
    public function getReceiver()
    {
        return $this->receiver;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Letter
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return mixed
     */
    public function getReceiverName()
    {
        return $this->receiverName;
    }

    /**
     * @param mixed $receiverName
     */
    public function setReceiverName($receiverName)
    {
        $this->receiverName = $receiverName;
    }

    /**
     * @return mixed
     */
    public function getSenderLevelIcon()
    {
        return $this->senderLevelIcon;
    }

    /**
     * @param mixed $senderLevelIcon
     */
    public function setSenderLevelIcon($senderLevelIcon)
    {
        $this->senderLevelIcon = $senderLevelIcon;
    }

    /**
     * @return mixed
     */
    public function getSenderRankName()
    {
        return $this->senderRankName;
    }

    /**
     * @param mixed $senderRankName
     */
    public function setSenderRankName($senderRankName)
    {
        $this->senderRankName = $senderRankName;
    }

    /**
     * @return mixed
     */
    public function getSenderRaceName()
    {
        return $this->senderRaceName;
    }

    /**
     * @param mixed $senderRaceName
     */
    public function setSenderRaceName($senderRaceName)
    {
        $this->senderRaceName = $senderRaceName;
    }

    /**
     * @return mixed
     */
    public function getSenderRaceIcon()
    {
        return $this->senderRaceIcon;
    }

    /**
     * @param mixed $senderRaceIcon
     */
    public function setSenderRaceIcon($senderRaceIcon)
    {
        $this->senderRaceIcon = $senderRaceIcon;
    }

    /**
     * @return string
     */
    public function getOldBody()
    {
        return $this->oldBody;
    }

    /**
     * @param string $oldBody
     */
    public function setOldBody($oldBody)
    {
        $this->oldBody = $oldBody;
    }

    /**
     * @return mixed
     */
    public function getIsForward()
    {
        return $this->isForward;
    }

    /**
     * @param mixed $isForward
     */
    public function setIsForward($isForward)
    {
        $this->isForward = $isForward;
    }

    /**
     * @return boolean
     */
    public function getNameAsFate()
    {
        return $this->nameAsFate;
    }

    /**
     * @param boolean $nameAsFate
     */
    public function setNameAsFate($nameAsFate)
    {
        $this->nameAsFate = $nameAsFate;
    }

    /**
     * @return boolean
     */
    public function getNameAsMod()
    {
        return $this->nameAsMod;
    }

    /**
     * @param boolean $nameAsMod
     */
    public function setNameAsMod($nameAsMod)
    {
        $this->nameAsMod = $nameAsMod;
    }

    /**
     * @return boolean
     */
    public function getNameAsAdmin()
    {
        return $this->nameAsAdmin;
    }

    /**
     * @param boolean $nameAsAdmin
     */
    public function setNameAsAdmin($nameAsAdmin)
    {
        $this->nameAsAdmin = $nameAsAdmin;
    }

    /**
     * Set background
     *
     * @param \Gdr\GameBundle\Entity\LetterBackground $background
     * @return Letter
     */
    public function setBackground(\Gdr\GameBundle\Entity\LetterBackground $background = null)
    {
        $this->background = $background;
    
        return $this;
    }

    /**
     * Get background
     *
     * @return \Gdr\GameBundle\Entity\LetterBackground 
     */
    public function getBackground()
    {
        return $this->background;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @return mixed
     */
    public function getSpecial()
    {
        return $this->special;
    }

    /**
     * @param mixed $special
     */
    public function setSpecial($special)
    {
        $this->special = $special;
    }
}
