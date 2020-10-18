<?php

namespace Gdr\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Chat
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gdr\GameBundle\Entity\ChatRepository")
 */
class Chat
{
    const TYPE_NORMAL = 1;
    const TYPE_ACTION = 2;
    const TYPE_WHISPER = 3;
    const TYPE_SYSTEM = 4;

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
     * @ORM\Column(name="body", type="text")
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = "2",
     *      minMessage = "Il testo deve avere almeno {{ limit }} caratteri"
     * )
     */
    private $body;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $castBody;

    /**
     * @var integer
     * @ORM\Column(name="type", type="integer")
     */
    private $type = 1;

    /**
     *
     * @ORM\Column(name="tag", type="string", length=255, nullable=true)
     */
    private $tag;


    /**
     * @var string
     *
     * @ORM\Column(name="freeTag", type="string", length=255, nullable=true)
     * @Assert\Length(
     *      max = "10",
     *      maxMessage = "Il campo tag non può essere più lungo di {{ limit }} caratteri."
     * )
     */
    private $freeTag;

    /**
     * @ORM\ManyToOne(targetEntity="Gdr\UserBundle\Entity\Personage")
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    private $sender;

    /**
     * @var string
     *
     * @ORM\Column(name="senderName", type="string", length=255, nullable=true)
     */
    private $senderName;

    /**
     * @var string
     *
     * @ORM\Column(name="senderRace", type="string", length=255, nullable=true)
     */
    private $senderRace;

    /**
     * @var string
     *
     * @ORM\Column(name="senderRaceIcon", type="string", length=255, nullable=true)
     */
    private $senderRaceIcon;

    /**
     * @var string
     *
     * @ORM\Column(name="senderDressIcon", type="string", length=255, nullable=true)
     */
    private $senderDressIcon;

    /**
     * @ORM\Column(name="senderDressName", type="string", length=255, nullable=true)
     */
    private $senderDressName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $senderLevelIcon;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $senderRankName;

    /**
     * @var string
     * @ORM\Column(name="receiverWhispered", type="string", length=255, nullable=true)
     */
    private $receiverWhispered;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    private $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity="Location")
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    private $location;

    /**
     * @ORM\ManyToOne(targetEntity="Gdr\UserBundle\Entity\Spell")
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    private $spell;

    /**
     * Indica se l'azione è fatta per essere rappresentata come: MOD, FATE, CASTI, CASTII, SYSTEM
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $special;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $skill;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $extra;

    /** @ORM\Column(type="string", length=255, nullable=true) */
    private $cssClass;

    /**
     * @ORM\ManyToOne(targetEntity="Gdr\RaceBundle\Entity\Race")
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    private $raceLanguage;

    /**
     * @ORM\ManyToOne(targetEntity="Gdr\UserBundle\Entity\Language")
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    private $language;

    /** @ORM\Column(type="string", length=255, nullable=true) */
    private $combat;

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
     * Set body
     *
     * @param string $body
     *
     * @return Chat
     */
    public function setBody($body)
    {
        $this->body = trim($body);

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
     * Set tag
     *
     * @param string $tag
     *
     * @return Chat
     */
    public function setTag($tag)
    {
        $this->tag = $tag;

        return $this;
    }

    /**
     * Get tag
     *
     * @return string
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Set freeTag
     *
     * @param string $freeTag
     *
     * @return Chat
     */
    public function setFreeTag($freeTag)
    {
        $this->freeTag = $freeTag;

        return $this;
    }

    /**
     * Get freeTag
     *
     * @return string
     */
    public function getFreeTag()
    {
        return $this->freeTag;
    }

    /**
     * Set senderName
     *
     * @param string $senderName
     *
     * @return Chat
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
     * Set senderRace
     *
     * @param string $senderRace
     *
     * @return Chat
     */
    public function setSenderRace($senderRace)
    {
        $this->senderRace = $senderRace;

        return $this;
    }

    /**
     * Get senderRace
     *
     * @return string
     */
    public function getSenderRace()
    {
        return $this->senderRace;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Chat
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
     * Set location
     *
     * @param \Gdr\GameBundle\Entity\Location $location
     *
     * @return Chat
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
     * @return string
     */
    public function getSenderRaceIcon()
    {
        return $this->senderRaceIcon;
    }

    /**
     * @param string $senderRaceIcon
     */
    public function setSenderRaceIcon($senderRaceIcon)
    {
        $this->senderRaceIcon = $senderRaceIcon;
    }

    /**
     * @return string
     */
    public function getSenderDressIcon()
    {
        return $this->senderDressIcon;
    }

    /**
     * @param string $senderDressIcon
     */
    public function setSenderDressIcon($senderDressIcon)
    {
        $this->senderDressIcon = $senderDressIcon;
    }

    /**
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param int $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getReceiverWhispered()
    {
        return $this->receiverWhispered;
    }

    /**
     * @param string $receiverWhispered
     */
    public function setReceiverWhispered($receiverWhispered)
    {
        $this->receiverWhispered = $receiverWhispered;
    }

    /**
     * @return mixed
     */
    public function getSenderDressName()
    {
        return $this->senderDressName;
    }

    /**
     * @param mixed $senderDressName
     */
    public function setSenderDressName($senderDressName)
    {
        $this->senderDressName = $senderDressName;
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

    /**
     * @return mixed
     */
    public function getCastBody()
    {
        return $this->castBody;
    }

    /**
     * @param mixed $castBody
     */
    public function setCastBody($castBody)
    {
        $this->castBody = $castBody;
    }

    /**
     * Set spell
     *
     * @param \Gdr\UserBundle\Entity\Spell $spell
     *
     * @return Chat
     */
    public function setSpell(\Gdr\UserBundle\Entity\Spell $spell = null)
    {
        $this->spell = $spell;

        return $this;
    }

    /**
     * Get spell
     *
     * @return \Gdr\UserBundle\Entity\Spell
     */
    public function getSpell()
    {
        return $this->spell;
    }

    /**
     * Set sender
     *
     * @param \Gdr\UserBundle\Entity\Personage $sender
     *
     * @return Chat
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
     * @return mixed
     */
    public function getExtra()
    {
        return $this->extra;
    }

    /**
     * @param mixed $extra
     */
    public function setExtra($extra)
    {
        $this->extra = $extra;
    }

    /**
     * @return mixed
     */
    public function getSkill()
    {
        return $this->skill;
    }

    /**
     * @param mixed $skill
     */
    public function setSkill($skill)
    {
        $this->skill = $skill;
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
    public function getCssClass()
    {
        return $this->cssClass;
    }

    /**
     * @param mixed $cssClass
     */
    public function setCssClass($cssClass)
    {
        $this->cssClass = $cssClass;
    }

    /**
     * Set raceLanguage
     *
     * @param \Gdr\RaceBundle\Entity\Race $raceLanguage
     * @return Chat
     */
    public function setRaceLanguage(\Gdr\RaceBundle\Entity\Race $raceLanguage = null)
    {
        $this->raceLanguage = $raceLanguage;
    
        return $this;
    }

    /**
     * Get raceLanguage
     *
     * @return \Gdr\RaceBundle\Entity\Race 
     */
    public function getRaceLanguage()
    {
        return $this->raceLanguage;
    }

    /**
     * Set language
     *
     * @param \Gdr\UserBundle\Entity\Language $language
     * @return Chat
     */
    public function setLanguage(\Gdr\UserBundle\Entity\Language $language = null)
    {
        $this->language = $language;
    
        return $this;
    }

    /**
     * Get language
     *
     * @return \Gdr\UserBundle\Entity\Language 
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @return mixed
     */
    public function getCombat()
    {
        return $this->combat;
    }

    /**
     * @param mixed $combat
     */
    public function setCombat($combat)
    {
        $this->combat = $combat;
    }
}
