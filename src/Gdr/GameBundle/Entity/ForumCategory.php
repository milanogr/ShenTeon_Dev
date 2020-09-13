<?php

namespace Gdr\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * ForumCategory
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gdr\GameBundle\Entity\ForumCategoryRepository")
 */
class ForumCategory
{
    const TYPE_PUBLIC = 1;
    const TYPE_ENCLAVE = 2;
    const TYPE_CLAN = 3;
    const TYPE_MOD = 4;
    const TYPE_FATE = 5;

    const DESK_GESTIONE = 1;
    const DESK_MOD = 2;
    const DESK_FATE = 3;

    const SPECIAL_ARALDO = 1;
    const SPECIAL_STRILLONE = 2;

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
     * @Assert\NotBlank()
     */
    protected $name;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank()
     */
    protected $description;

    /**
     * @ORM\ManyToOne(targetEntity="Forum")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    protected $forum;

    /**
     * @ORM\ManyToOne(targetEntity="ForumThread")
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    protected $lastThread;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $lastPostAuthor;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $lastPostTime;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $isActive = true;

    /**
     * @var bool
     * @ORM\Column(type="boolean")
     */
    protected $isJunk = false;

    /**
     * @var bool
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $helpDesk;

    /**
     * @var bool
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $special;

    /**
     * Se il forum è di tipo Enclave o Clan, mostro la sezione solo se il rank è >=.
     *
     * @ORM\Column(type="integer")
     */
    protected $levelMin = 1;

    /**
     * @var bool
     * @ORM\Column(type="integer", nullable=true)
     */
    private $sort = 0;

    public static function getHelpDesks(){
        return array(
            self::DESK_GESTIONE => 'Gestione',
            self::DESK_MOD => 'Moderazione',
            self::DESK_FATE => 'Fato'
        );
    }

    public static function getSpecials(){
        return array(
            self::SPECIAL_ARALDO => 'Araldo',
            self::SPECIAL_STRILLONE => 'Strillone'
        );
    }

    public function __toString(){
        return (string) $this->getName();
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
     * @return ForumCategory
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
     * @return ForumCategory
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
     * Set levelMin
     *
     * @param integer $levelMin
     * @return ForumCategory
     */
    public function setLevelMin($levelMin)
    {
        $this->levelMin = $levelMin;
    
        return $this;
    }

    /**
     * Get levelMin
     *
     * @return integer 
     */
    public function getLevelMin()
    {
        return $this->levelMin;
    }

    /**
     * Set forum
     *
     * @param \Gdr\GameBundle\Entity\Forum $forum
     * @return ForumCategory
     */
    public function setForum(\Gdr\GameBundle\Entity\Forum $forum = null)
    {
        $this->forum = $forum;
    
        return $this;
    }

    /**
     * Get forum
     *
     * @return \Gdr\GameBundle\Entity\Forum 
     */
    public function getForum()
    {
        return $this->forum;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getLastPostTime()
    {
        return $this->lastPostTime;
    }

    /**
     * @param mixed $lastPostTime
     */
    public function setLastPostTime($lastPostTime)
    {
        $this->lastPostTime = $lastPostTime;
    }

    /**
     * @return mixed
     */
    public function getLastPostAuthor()
    {
        return $this->lastPostAuthor;
    }

    /**
     * @param mixed $lastPostAuthor
     */
    public function setLastPostAuthor($lastPostAuthor)
    {
        $this->lastPostAuthor = $lastPostAuthor;
    }

    /**
     * Set lastThread
     *
     * @param \Gdr\GameBundle\Entity\ForumThread $lastThread
     * @return ForumCategory
     */
    public function setLastThread(\Gdr\GameBundle\Entity\ForumThread $lastThread = null)
    {
        $this->lastThread = $lastThread;
    
        return $this;
    }

    /**
     * Get lastThread
     *
     * @return \Gdr\GameBundle\Entity\ForumThread 
     */
    public function getLastThread()
    {
        return $this->lastThread;
    }

    /**
     * @return boolean
     */
    public function getIsJunk()
    {
        return $this->isJunk;
    }

    /**
     * @param boolean $isJunk
     */
    public function setIsJunk($isJunk)
    {
        $this->isJunk = $isJunk;
    }

    /**
     * @return boolean
     */
    public function getHelpDesk()
    {
        return $this->helpDesk;
    }

    /**
     * @param boolean $helpDesk
     */
    public function setHelpDesk($helpDesk)
    {
        $this->helpDesk = $helpDesk;
    }

    /**
     * @return boolean
     */
    public function getSpecial()
    {
        return $this->special;
    }

    /**
     * @param boolean $special
     */
    public function setSpecial($special)
    {
        $this->special = $special;
    }

    /**
     * @return boolean
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * @param boolean $sort
     */
    public function setSort($sort)
    {
        $this->sort = $sort;
    }
}
