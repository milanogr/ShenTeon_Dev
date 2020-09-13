<?php

namespace Gdr\UserBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Gdr\UserBundle\Validator\Constraint as GdrUserAssert;

/**
 * Personage
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gdr\UserBundle\Entity\PersonageRepository")
 * @Vich\Uploadable
 * @UniqueEntity(fields="name", message="Questo nome non è disponibile, devi sceglierne un altro.")
 */
class Personage
{
    const MALE = 1;
    const FEMALE = 2;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="personages")
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    protected $user;

    /**
     * @ORM\ManyToOne(targetEntity="Gdr\RaceBundle\Entity\Race")
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    private $race;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     * @Assert\Length(min = "4", max = "15", maxMessage = "Non puoi superare {{ limit }} caratteri per il nome.", minMessage = "Il nome deve essere lungo almeno 4 caratteri.")
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Surname")
     * @ORM\JoinColumn(onDelete="SET NULL")
     *
     */
    private $surname;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var string
     * @ORM\Column(name="description", type="text", nullable=true)
     * @Assert\Length(
     *      max = "350",
     *      maxMessage = "La descrizione non può essere più lunga di {{ limit }} caratteri."
     * )
     */
    private $description;

    /**
     * @Assert\Image(
     *     maxSize="300k",
     *     minWidth = 300,
     *     maxWidth = 300,
     *     minHeight = 300,
     *     maxHeight = 300
     * )
     * @Vich\UploadableField(mapping="avatar_image", fileNameProperty="avatarName")
     *
     * @var File $avatar
     */
    protected $avatar;

    /**
     * @var string
     * @ORM\Column(type="string", length=255, name="avatarName", nullable=true)
     */
    private $avatarName;

    /**
     * @var string
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(
     *      max = "60",
     *      maxMessage = "Il nome esteso non può essere più lungo di {{ limit }} caratteri."
     * )
     */
    private $nameExtended;

    /**
     * @var string
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(
     *      max = "30",
     *      maxMessage = "Il campo attività non può essere più lungo di {{ limit }} caratteri."
     * )
     */
    private $activity;

    /**
     * @ORM\ManyToOne(targetEntity="Gdr\GameBundle\Entity\Location")
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    private $address;

    /**
     * @var int
     * @ORM\Column(type="string", length=255)
     */
    private $gender = 1;

    /**
     * @ORM\Column(type="integer")
     */
    private $experience = 0;

    /**
     * @ORM\Column(type="integer")
     */
    private $globalExperience = 0;

    /**
     * @var string
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(
     *      max = "100",
     *      maxMessage = "Il capo relazioni non può essere più lungo di {{ limit }} caratteri."
     * )
     */
    private $relationship;
	
	 /**
     * @var string
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(
     *      max = "100",
     *      maxMessage = "Troppo lungo"
     * )
     */
    private $music;

	 /**
     * @var string
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(
     *      max = "100",
     *      maxMessage = "Troppo lungo"
     * )
     */
    private $musicName;
	
    /**
     * @var string
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(
     *      max = "100",
     *      maxMessage = "Il campo amicizie non può essere più lungo di {{ limit }} caratteri."
     * )
     */
    private $friendship;

    /**
     * @ORM\ManyToOne(targetEntity="Gdr\GameBundle\Entity\EnclaveRank")
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    private $enclaveRank;

    /**
     * @ORM\ManyToOne(targetEntity="Gdr\GameBundle\Entity\EnclaveRank")
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    private $clanRank;

    /**
     * @ORM\OneToOne(targetEntity="Gdr\UserBundle\Entity\Online", mappedBy="personage")
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    private $online;

    /**
     * @var \Datetime
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $lastLogin;

    /**
     * @var \Datetime
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $lastLogout;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     */
    private $bankAmount = 0;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     */
    private $bagAmount = 0;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     */
    private $age = 0;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    private $weight = 0;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    private $height = 0;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updatedAt", type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="lastBirthday", type="date")
     * @Gedmo\Timestampable(on="create")
     */
    private $lastBirthday;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="deadAt", type="datetime", nullable=true)
     */
    private $deadAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="lastDeadAt", type="datetime", nullable=true)
     */
    private $lastDeadAt;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isSuicide = false;

    /**
     * @ORM\Column(name="raceLevel", type="integer")
     */
    private $raceLevel = 1;

    /**
     * @ORM\Column(name="combatLevel", type="integer")
     */
    private $combatLevel = 0;

    /**
     * @ORM\ManyToOne(targetEntity="Gdr\RaceBundle\Entity\RaceLevel")
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    private $skillsLevel;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $canStudyGrimoryAt;

    /**
     * @ORM\Column(type="boolean")
     */
    private $hideEnclave = false;

    /**
     * @ORM\Column(type="boolean")
     */
    private $hideClan = false;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isDead = false;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isSpecialDeath = false;

    /**
     * @var string
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $widowOf;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $lastWork;

    /**
     * @ORM\ManyToOne(targetEntity="Gdr\RaceBundle\Entity\EyeColor")
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    private $eyeColor;

    /**
     * @ORM\ManyToOne(targetEntity="Gdr\RaceBundle\Entity\FurColor")
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    private $furColor;

    /**
     * @ORM\ManyToOne(targetEntity="Gdr\RaceBundle\Entity\HairColor")
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    private $hairColor;

    /**
     * @ORM\ManyToOne(targetEntity="Gdr\RaceBundle\Entity\SkinColor")
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    private $skinColor;

    /**
     * @ORM\ManyToOne(targetEntity="Gdr\RaceBundle\Entity\SquamaColor")
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    private $squamaColor;

    /**
     * @ORM\OneToOne(targetEntity="Personage")
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    private $marriedWith;

    /**
     * @ORM\Column(type="boolean")
     */
    private $useRealRace = false;

    /**
     * @ORM\Column(type="decimal", scale=2)
     */
    private $carisma = 0;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $status;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isSoundActive = false;

    /**
     * @ORM\Column(type="integer")
     */
    private $combatChatPoints = 0;

    /**
     * @ORM\Column(type="integer")
     */
    private $combatPoints = 0;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isExWarrior = false;

    /**
     * @var string
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fateNote;
	
		

    public function __toString()
    {
        return (string)$this->getName();
    }

    public function getIsSoul()
    {
        if ($this->getIsDead()) {
            $compare = $this->getDeadAt();
            $toadd = ($this->getIsSuicide()) ? 21 : 7;
            $compare->modify("+" . $toadd . " days");
            $new_date = new \DateTime();

            return ($compare > $new_date);
        }

        return false;
    }

    public function __construct()
    {
        $this->lettersSended = new ArrayCollection();
        $this->lettersReceived = new ArrayCollection();
    }

    public static function getGenders()
    {
        return array(
            self::MALE => 'Maschio',
            self::FEMALE => 'Femmina'
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
     * @return Personage
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
     * Set lastLogin
     *
     * @param \DateTime $lastLogin
     *
     * @return Personage
     */
    public function setLastLogin($lastLogin)
    {
        $this->lastLogin = $lastLogin;

        return $this;
    }

    /**
     * Get lastLogin
     *
     * @return \DateTime
     */
    public function getLastLogin()
    {
        return $this->lastLogin;
    }

    /**
     * Set lastLogout
     *
     * @param \DateTime $lastLogout
     *
     * @return Personage
     */
    public function setLastLogout($lastLogout)
    {
        $this->lastLogout = $lastLogout;

        return $this;
    }

    /**
     * Get lastLogout
     *
     * @return \DateTime
     */
    public function getLastLogout()
    {
        return $this->lastLogout;
    }

    /**
     * Set bankAmount
     *
     * @param integer $bankAmount
     *
     * @return Personage
     */
    public function setBankAmount($bankAmount)
    {
        $this->bankAmount = $bankAmount;

        return $this;
    }

    /**
     * Get bankAmount
     *
     * @return integer
     */
    public function getBankAmount()
    {
        return $this->bankAmount;
    }

    /**
     * Set bagAmount
     *
     * @param integer $bagAmount
     *
     * @return Personage
     */
    public function setBagAmount($bagAmount)
    {
        $this->bagAmount = $bagAmount;

        return $this;
    }

    /**
     * Get bagAmount
     *
     * @return integer
     */
    public function getBagAmount()
    {
        return $this->bagAmount;
    }

    /**
     * Set age
     *
     * @param integer $age
     *
     * @return Personage
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return integer
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set weight
     *
     * @param integer $weight
     *
     * @return Personage
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
     * Set height
     *
     * @param integer $height
     *
     * @return Personage
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Get height
     *
     * @return integer
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Get strength
     *
     * @return integer
     */
    public function getStrength()
    {
        return (!is_null($this->getSkillsLevel())) ? $this->getSkillsLevel()->getStrength() : 0;
    }

    /**
     * Get sapience
     *
     * @return integer
     */
    public function getSapience()
    {
        return (!is_null($this->getSkillsLevel())) ? $this->getSkillsLevel()->getWisdom() : 0;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Personage
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
     * Set user
     *
     * @param \Gdr\UserBundle\Entity\User $user
     *
     * @return Personage
     */
    public function setUser(\Gdr\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Gdr\UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set race
     *
     * @param \Gdr\RaceBundle\Entity\Race $race
     *
     * @return Personage
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
     * Set surname
     *
     * @param \Gdr\UserBundle\Entity\Surname $surname
     *
     * @return Personage
     */
    public function setSurname(\Gdr\UserBundle\Entity\Surname $surname = null)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return \Gdr\UserBundle\Entity\Surname
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set enclaveRank
     *
     * @param \Gdr\GameBundle\Entity\EnclaveRank $enclaveRank
     *
     * @return Personage
     */
    public function setEnclaveRank(\Gdr\GameBundle\Entity\EnclaveRank $enclaveRank = null)
    {
        $this->enclaveRank = $enclaveRank;

        return $this;
    }

    /**
     * Get enclaveRank
     *
     * @return \Gdr\GameBundle\Entity\EnclaveRank
     */
    public function getEnclaveRank()
    {
        return $this->enclaveRank;
    }

    /**
     * Set clanRank
     *
     * @param \Gdr\GameBundle\Entity\EnclaveRank $clanRank
     *
     * @return Personage
     */
    public function setClanRank(\Gdr\GameBundle\Entity\EnclaveRank $clanRank = null)
    {
        $this->clanRank = $clanRank;

        return $this;
    }

    /**
     * Get clanRank
     *
     * @return \Gdr\GameBundle\Entity\EnclaveRank
     */
    public function getClanRank()
    {
        return $this->clanRank;
    }

    /**
     * Add lettersSended
     *
     * @param \Gdr\GameBundle\Entity\Letter $lettersSended
     *
     * @return Personage
     */
    public function addLettersSended(\Gdr\GameBundle\Entity\Letter $lettersSended)
    {
        $this->lettersSended[] = $lettersSended;

        return $this;
    }

    /**
     * Remove lettersSended
     *
     * @param \Gdr\GameBundle\Entity\Letter $lettersSended
     */
    public function removeLettersSended(\Gdr\GameBundle\Entity\Letter $lettersSended)
    {
        $this->lettersSended->removeElement($lettersSended);
    }

    /**
     * Get lettersSended
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLettersSended()
    {
        return $this->lettersSended;
    }

    /**
     * Add lettersReceived
     *
     * @param \Gdr\GameBundle\Entity\Letter $lettersReceived
     *
     * @return Personage
     */
    public function addLettersReceived(\Gdr\GameBundle\Entity\Letter $lettersReceived)
    {
        $this->lettersReceived[] = $lettersReceived;

        return $this;
    }

    /**
     * Remove lettersReceived
     *
     * @param \Gdr\GameBundle\Entity\Letter $lettersReceived
     */
    public function removeLettersReceived(\Gdr\GameBundle\Entity\Letter $lettersReceived)
    {
        $this->lettersReceived->removeElement($lettersReceived);
    }

    /**
     * Get lettersReceived
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLettersReceived()
    {
        return $this->lettersReceived;
    }

    /**
     * Set eyeColor
     *
     * @param \Gdr\RaceBundle\Entity\EyeColor $eyeColor
     *
     * @return Personage
     */
    public function setEyeColor(\Gdr\RaceBundle\Entity\EyeColor $eyeColor = null)
    {
        $this->eyeColor = $eyeColor;

        return $this;
    }

    /**
     * Get eyeColor
     *
     * @return \Gdr\RaceBundle\Entity\EyeColor
     */
    public function getEyeColor()
    {
        return $this->eyeColor;
    }

    /**
     * Set online
     *
     * @param \Gdr\UserBundle\Entity\Online $online
     *
     * @return Personage
     */
    public function setOnline(\Gdr\UserBundle\Entity\Online $online = null)
    {
        $this->online = $online;

        return $this;
    }

    /**
     * Get online
     *
     * @return \Gdr\UserBundle\Entity\Online
     */
    public function getOnline()
    {
        return $this->online;
    }

    /**
     * Set nameExtended
     *
     * @param string $nameExtended
     *
     * @return Personage
     */
    public function setNameExtended($nameExtended)
    {
        $this->nameExtended = $nameExtended;

        return $this;
    }

    /**
     * Get nameExtended
     *
     * @return string
     */
    public function getNameExtended()
    {
        return $this->nameExtended;
    }

    /**
     * Set activity
     *
     * @param string $activity
     *
     * @return Personage
     */
    public function setActivity($activity)
    {
        $this->activity = $activity;

        return $this;
    }

    /**
     * Get activity
     *
     * @return string
     */
    public function getActivity()
    {
        return $this->activity;
    }

    /**
     * Set relationship
     *
     * @param string $relationship
     *
     * @return Personage
     */
    public function setRelationship($relationship)
    {
        $this->relationship = $relationship;

        return $this;
    }

    /**
     * Get relationship
     *
     * @return string
     */
    public function getRelationship()
    {
        return $this->relationship;
    }

    /**
     * Set friendship
     *
     * @param string $friendship
     *
     * @return Personage
     */
    public function setFriendship($friendship)
    {
        $this->friendship = $friendship;

        return $this;
    }

    /**
     * Get friendship
     *
     * @return string
     */
    public function getFriendship()
    {
        return $this->friendship;
    }
	
	/**
     * Set music
     *
     * @param string $music
     *
     * @return Personage
     */
    public function setMusic($music)
    {
        $this->music = $music;

        return $this;
    }

    /**
     * Get music
     *
     * @return string
     */
    public function getMusic()
    {
        return $this->music;
    }

	/**
     * Set musicName
     *
     * @param string $musicName
     *
     * @return Personage
     */
    public function setMusicName($musicName)
    {
        $this->musicName = $musicName;

        return $this;
    }

    /**
     * Get musicName
     *
     * @return string
     */
    public function getMusicName()
    {
        return $this->musicName;
    }
	


    /**
     * Set description
     *
     * @param string $description
     *
     * @return Personage
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
     * @return \Symfony\Component\HttpFoundation\File\File
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\File\File $avatar
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        if ($avatar instanceof UploadedFile) {
            $this->setUpdatedAt(new \DateTime());
        }
    }

    /**
     * @return string
     */
    public function getAvatarName()
    {
        return $this->avatarName;
    }

    /**
     * @param string $avatarName
     */
    public function setAvatarName($avatarName)
    {
        $this->avatarName = $avatarName;
    }

    /**
     * @return int
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param int $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
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
     * @return mixed
     */
    public function getRaceLevel()
    {
        return $this->raceLevel;
    }

    /**
     * @param mixed $raceLevel
     */
    public function setRaceLevel($raceLevel)
    {
        $this->raceLevel = $raceLevel;
    }

    /**
     * @return mixed
     */
    public function getCombatLevel()
    {
        return $this->combatLevel;
    }

    /**
     * @param mixed $combatLevel
     */
    public function setCombatLevel($combatLevel)
    {
        $this->combatLevel = $combatLevel;
    }

    /**
     * @return mixed
     */
    public function getCanStudyGrimoryAt()
    {
        return $this->canStudyGrimoryAt;
    }

    /**
     * @param mixed $canStudyGrimoryAt
     */
    public function setCanStudyGrimoryAt($canStudyGrimoryAt)
    {
        $this->canStudyGrimoryAt = $canStudyGrimoryAt;
    }

    /**
     * @return mixed
     */
    public function getExperience()
    {
        return $this->experience;
    }

    /**
     * @param mixed $experience
     */
    public function setExperience($experience)
    {
        $this->experience = $experience;
    }

    /**
     * @return mixed
     */
    public function getHideEnclave()
    {
        return $this->hideEnclave;
    }

    /**
     * @param mixed $hideEnclave
     */
    public function setHideEnclave($hideEnclave)
    {
        $this->hideEnclave = $hideEnclave;
    }

    /**
     * @return mixed
     */
    public function getHideClan()
    {
        return $this->hideClan;
    }

    /**
     * @param mixed $hideClan
     */
    public function setHideClan($hideClan)
    {
        $this->hideClan = $hideClan;
    }

    // ------------

    public function hasEnclave()
    {
        $rank = $this->getEnclaveRank();
        if (null !== $rank) {
            return $this->getEnclaveRank()->getEnclave();
        } else {
            return false;
        }
    }

    public function hasClan()
    {
        $rank = $this->getClanRank();
        if (null !== $rank) {
            return $this->getClanRank()->getEnclave();
        } else {
            return false;
        }
    }

    public function getRaceIcon()
    {
        if ($this->getGender() == Personage::MALE) {
            return $this->getRace()->getMaleIconName();
        } else {
            return $this->getRace()->getFemaleIconName();
        }
    }


    /**
     * Set lastWork
     *
     * @param \DateTime $lastWork
     * @return Personage
     */
    public function setLastWork($lastWork)
    {
        $this->lastWork = $lastWork;
    
        return $this;
    }

    /**
     * Get lastWork
     *
     * @return \DateTime 
     */
    public function getLastWork()
    {
        return $this->lastWork;
    }

    /**
     * Set furColor
     *
     * @param \Gdr\RaceBundle\Entity\FurColor $furColor
     * @return Personage
     */
    public function setFurColor(\Gdr\RaceBundle\Entity\FurColor $furColor = null)
    {
        $this->furColor = $furColor;
    
        return $this;
    }

    /**
     * Get furColor
     *
     * @return \Gdr\RaceBundle\Entity\FurColor 
     */
    public function getFurColor()
    {
        return $this->furColor;
    }

    /**
     * Set hairColor
     *
     * @param \Gdr\RaceBundle\Entity\HairColor $hairColor
     * @return Personage
     */
    public function setHairColor(\Gdr\RaceBundle\Entity\HairColor $hairColor = null)
    {
        $this->hairColor = $hairColor;
    
        return $this;
    }

    /**
     * Get hairColor
     *
     * @return \Gdr\RaceBundle\Entity\HairColor 
     */
    public function getHairColor()
    {
        return $this->hairColor;
    }

    /**
     * Set skinColor
     *
     * @param \Gdr\RaceBundle\Entity\SkinColor $skinColor
     * @return Personage
     */
    public function setSkinColor(\Gdr\RaceBundle\Entity\SkinColor $skinColor = null)
    {
        $this->skinColor = $skinColor;
    
        return $this;
    }

    /**
     * Get skinColor
     *
     * @return \Gdr\RaceBundle\Entity\SkinColor 
     */
    public function getSkinColor()
    {
        return $this->skinColor;
    }

    /**
     * Set squamaColor
     *
     * @param \Gdr\RaceBundle\Entity\SquamaColor $squamaColor
     * @return Personage
     */
    public function setSquamaColor(\Gdr\RaceBundle\Entity\SquamaColor $squamaColor = null)
    {
        $this->squamaColor = $squamaColor;
    
        return $this;
    }

    /**
     * Get squamaColor
     *
     * @return \Gdr\RaceBundle\Entity\SquamaColor 
     */
    public function getSquamaColor()
    {
        return $this->squamaColor;
    }

    /**
     * Set skillsLevel
     *
     * @param \Gdr\RaceBundle\Entity\RaceLevel $skillsLevel
     * @return Personage
     */
    public function setSkillsLevel(\Gdr\RaceBundle\Entity\RaceLevel $skillsLevel = null)
    {
        $this->skillsLevel = $skillsLevel;
    
        return $this;
    }

    /**
     * Get skillsLevel
     *
     * @return \Gdr\RaceBundle\Entity\RaceLevel 
     */
    public function getSkillsLevel()
    {
        return $this->skillsLevel;
    }


    /**
     * Set isDead
     *
     * @param boolean $isDead
     * @return Personage
     */
    public function setIsDead($isDead)
    {
        $this->isDead = $isDead;
    
        return $this;
    }

    /**
     * Get isDead
     *
     * @return boolean 
     */
    public function getIsDead()
    {
        return $this->isDead;
    }

    /**
     * Set deadAt
     *
     * @param \DateTime $deadAt
     * @return Personage
     */
    public function setDeadAt($deadAt)
    {
        $this->deadAt = $deadAt;
    
        return $this;
    }

    /**
     * Get deadAt
     *
     * @return \DateTime 
     */
    public function getDeadAt()
    {
        return $this->deadAt;
    }

    /**
     * Set isSuicide
     *
     * @param boolean $isSuicide
     * @return Personage
     */
    public function setIsSuicide($isSuicide)
    {
        $this->isSuicide = $isSuicide;
    
        return $this;
    }

    /**
     * Get isSuicide
     *
     * @return boolean 
     */
    public function getIsSuicide()
    {
        return $this->isSuicide;
    }

    /**
     * Set isSpecialDeath
     *
     * @param boolean $isSpecialDeath
     * @return Personage
     */
    public function setIsSpecialDeath($isSpecialDeath)
    {
        $this->isSpecialDeath = $isSpecialDeath;
    
        return $this;
    }

    /**
     * Get isSpecialDeath
     *
     * @return boolean 
     */
    public function getIsSpecialDeath()
    {
        return $this->isSpecialDeath;
    }

    public function getRightSkin()
    {
        if ($this->getSkinColor()) {
            return $this->getSkinColor();
        }
        if ($this->getSquamaColor()) {
            return $this->getSquamaColor();
        }
        if ($this->getFurColor()) {
            return $this->getFurColor();
        }

        return null;
    }

    public function canManageEnclave(){
        $rank = $this->getEnclaveRank();
        if(is_null($rank))
            return false;
        return ($rank->getIsMaster() || $rank->getIsViceMaster());
    }

    public function canManageClan(){
        $rank = $this->getClanRank();
        if(is_null($rank))
            return false;
        return ($rank->getIsMaster() || $rank->getIsViceMaster());
    }

    /**
     * Set widowOf
     *
     * @param string $widowOf
     * @return Personage
     */
    public function setWidowOf($widowOf)
    {
        $this->widowOf = $widowOf;
    
        return $this;
    }

    /**
     * Get widowOf
     *
     * @return string 
     */
    public function getWidowOf()
    {
        return $this->widowOf;
    }


    /**
     * Set marriedWith
     *
     * @param \Gdr\UserBundle\Entity\Personage $marriedWith
     * @return Personage
     */
    public function setMarriedWith(\Gdr\UserBundle\Entity\Personage $marriedWith = null)
    {
        $this->marriedWith = $marriedWith;
    
        return $this;
    }

    /**
     * Get marriedWith
     *
     * @return \Gdr\UserBundle\Entity\Personage 
     */
    public function getMarriedWith()
    {
        return $this->marriedWith;
    }

    /**
     * Set address
     *
     * @param \Gdr\GameBundle\Entity\Location $address
     * @return Personage
     */
    public function setAddress(\Gdr\GameBundle\Entity\Location $address = null)
    {
        $this->address = $address;
    
        return $this;
    }

    /**
     * Get address
     *
     * @return \Gdr\GameBundle\Entity\Location 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @return mixed
     */
    public function getUseRealRace()
    {
        return $this->useRealRace;
    }

    /**
     * @param mixed $useRealRace
     */
    public function setUseRealRace($useRealRace)
    {
        $this->useRealRace = $useRealRace;
    }

    /**
     * @return mixed
     */
    public function getCarisma()
    {
        return $this->carisma;
    }

    /**
     * @param mixed $carisma
     */
    public function setCarisma($carisma)
    {
        $this->carisma = $carisma;
    }

    /**
     * @return mixed
     */
    public function getGlobalExperience()
    {
        return $this->globalExperience;
    }

    /**
     * @param mixed $globalExperience
     */
    public function setGlobalExperience($globalExperience)
    {
        $this->globalExperience = $globalExperience;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getIsSoundActive()
    {
        return $this->isSoundActive;
    }

    /**
     * @param mixed $isSoundActive
     */
    public function setIsSoundActive($isSoundActive)
    {
        $this->isSoundActive = $isSoundActive;
    }

    /**
     * Set lastBirthday
     *
     * @param \DateTime $lastBirthday
     * @return Personage
     */
    public function setLastBirthday($lastBirthday)
    {
        $this->lastBirthday = $lastBirthday;
    
        return $this;
    }

    /**
     * Get lastBirthday
     *
     * @return \DateTime 
     */
    public function getLastBirthday()
    {
        return $this->lastBirthday;
    }

    /**
     * @return mixed
     */
    public function getCombatPoints()
    {
        return $this->combatPoints;
    }

    /**
     * @param mixed $combatPoints
     */
    public function setCombatPoints($combatPoints)
    {
        $this->combatPoints = $combatPoints;
    }

    /**
     * @return mixed
     */
    public function getCombatChatPoints()
    {
        return $this->combatChatPoints;
    }

    /**
     * @param mixed $combatChatPoints
     */
    public function setCombatChatPoints($combatChatPoints)
    {
        $this->combatChatPoints = $combatChatPoints;
    }

    /**
     * @return mixed
     */
    public function getIsWarrior()
    {
        return $this->isWarrior;
    }

    /**
     * @param mixed $isWarrior
     */
    public function setIsWarrior($isWarrior)
    {
        $this->isWarrior = $isWarrior;
    }

    /**
     * @return mixed
     */
    public function getIsExWarrior()
    {
        return $this->isExWarrior;
    }

    /**
     * @param mixed $isExWarrior
     */
    public function setIsExWarrior($isExWarrior)
    {
        $this->isExWarrior = $isExWarrior;
    }

    /**
     * @return string
     */
    public function getFateNote()
    {
        return $this->fateNote;
    }

    /**
     * @param string $fateNote
     */
    public function setFateNote($fateNote)
    {
        $this->fateNote = $fateNote;
    }

    /**
     * @return \DateTime
     */
    public function getLastDeadAt()
    {
        return $this->lastDeadAt;
    }

    /**
     * @param \DateTime $lastDeadAt
     */
    public function setLastDeadAt($lastDeadAt)
    {
        $this->lastDeadAt = $lastDeadAt;
    }
}