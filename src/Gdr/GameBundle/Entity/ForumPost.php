<?php

namespace Gdr\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * ForumPost
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gdr\GameBundle\Entity\ForumPostRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class ForumPost
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
     *
     * @ORM\ManyToOne(targetEntity="ForumThread", cascade={"persist"})
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    protected $thread;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Gdr\UserBundle\Entity\Personage")
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    protected $author;

    /**
     * @var string
     *
     * @ORM\Column(name="body", type="text")
     * @Assert\NotBlank(message="Il testo è obbligatorio.")
     */
    private $body;

    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $updatedBy;

    /**
     * @var string
     *
     * @ORM\Column(name="authorName", type="string", length=255)
     */
    private $authorName;

    /**
     * @var string
     *
     * @ORM\Column(name="authorRaceName", type="string", length=255, nullable=true)
     */
    private $authorRaceName;

    /**
     * @var string
     *
     * @ORM\Column(name="authorRaceIcon", type="string", length=255, nullable=true)
     */
    private $authorRaceIcon;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $authorLevelName;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $authorLevelIcon;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isFirstPost", type="boolean")
     */
    private $isFirstPost = false;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     */
    private $isLastPost = true;

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
    private $isClosed = false;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     */
    private $isDeleted = false;

    protected $threadForm;

    // -----------------

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
     * @return ForumPost
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return ForumPost
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
     * @return ForumPost
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
     * Set authorName
     *
     * @param string $authorName
     * @return ForumPost
     */
    public function setAuthorName($authorName)
    {
        $this->authorName = $authorName;
    
        return $this;
    }

    /**
     * Get authorName
     *
     * @return string 
     */
    public function getAuthorName()
    {
        return $this->authorName;
    }

    /**
     * Set authorRaceName
     *
     * @param string $authorRaceName
     * @return ForumPost
     */
    public function setAuthorRaceName($authorRaceName)
    {
        $this->authorRaceName = $authorRaceName;
    
        return $this;
    }

    /**
     * Get authorRaceName
     *
     * @return string 
     */
    public function getAuthorRaceName()
    {
        return $this->authorRaceName;
    }

    /**
     * Set authorRaceIcon
     *
     * @param string $authorRaceIcon
     * @return ForumPost
     */
    public function setAuthorRaceIcon($authorRaceIcon)
    {
        $this->authorRaceIcon = $authorRaceIcon;
    
        return $this;
    }

    /**
     * Get authorRaceIcon
     *
     * @return string 
     */
    public function getAuthorRaceIcon()
    {
        return $this->authorRaceIcon;
    }

    /**
     * Set isFirstPost
     *
     * @param boolean $isFirstPost
     * @return ForumPost
     */
    public function setIsFirstPost($isFirstPost)
    {
        $this->isFirstPost = $isFirstPost;
    
        return $this;
    }

    /**
     * Get isFirstPost
     *
     * @return boolean 
     */
    public function getIsFirstPost()
    {
        return $this->isFirstPost;
    }

    /**
     * Set isDeleted
     *
     * @param boolean $isDeleted
     * @return ForumPost
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
     * Set thread
     *
     * @param \Gdr\GameBundle\Entity\ForumThread $thread
     * @return ForumPost
     */
    public function setThread(\Gdr\GameBundle\Entity\ForumThread $thread = null)
    {
        $this->thread = $thread;
    
        return $this;
    }

    /**
     * Get thread
     *
     * @return \Gdr\GameBundle\Entity\ForumThread 
     */
    public function getThread()
    {
        return $this->thread;
    }

    /**
     * Set author
     *
     * @param \Gdr\UserBundle\Entity\Personage $author
     * @return ForumPost
     */
    public function setAuthor(\Gdr\UserBundle\Entity\Personage $author = null)
    {
        $this->author = $author;
    
        return $this;
    }

    /**
     * Get author
     *
     * @return \Gdr\UserBundle\Entity\Personage 
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @return string
     */
    public function getAuthorLevelIcon()
    {
        return $this->authorLevelIcon;
    }

    /**
     * @param string $authorLevelIcon
     */
    public function setAuthorLevelIcon($authorLevelIcon)
    {
        $this->authorLevelIcon = $authorLevelIcon;
    }

    /**
     * @return string
     */
    public function getAuthorLevelName()
    {
        return $this->authorLevelName;
    }

    /**
     * @param string $authorLevelName
     */
    public function setAuthorLevelName($authorLevelName)
    {
        $this->authorLevelName = $authorLevelName;
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
    public function getIsLastPost()
    {
        return $this->isLastPost;
    }

    /**
     * @param boolean $isLastPost
     */
    public function setIsLastPost($isLastPost)
    {
        $this->isLastPost = $isLastPost;
    }

    /**
     * @return boolean
     */
    public function getIsClosed()
    {
        return $this->isClosed;
    }

    /**
     * @param boolean $isClosed
     */
    public function setIsClosed($isClosed)
    {
        $this->isClosed = $isClosed;
    }

    /**
     * @return mixed
     */
    public function getThreadForm()
    {
        return $this->threadForm;
    }

    /**
     * @param mixed $threadForm
     */
    public function setThreadForm($threadForm)
    {
        $this->threadForm = $threadForm;
    }

    /**
     * @return string
     */
    public function getUpdatedBy()
    {
        return $this->updatedBy;
    }

    /**
     * @param string $updatedBy
     */
    public function setUpdatedBy($updatedBy)
    {
        $this->updatedBy = $updatedBy;
    }
}
