<?php

namespace Gdr\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * ForumThread
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gdr\GameBundle\Entity\ForumThreadRepository")
 */
class ForumThread
{
    const STATUS_NORMAL = 1;
    const STATUS_IMPORTANT = 10;
    const STATUS_ANNOUNCE = 20;

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
     * @ORM\Column(name="title", type="string", length=255)
     * @Assert\NotBlank(message="Il testo è obbligatorio.")
     * @Assert\Length(
     *      min = "5",
     *      max = "199",
     *      minMessage = "Il titolo deve essere lungo almeno {{ limit }} caratteri.",
     *      maxMessage = "Il titolo non può essere più lungo di {{ limit }} caratteri."
     * )
     */
    private $title;

    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity="ForumCategory")
     */
    private $category;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lastPostAuthor;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $lastPostTime;

    /**
     * @ORM\Column(type="integer")
     */
    private $readed = 0;

    /**
     * @ORM\Column(type="integer")
     */
    private $replied = 0;

    /**
     * @ORM\Column(type="integer")
     */
    private $status = self::STATUS_NORMAL;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isLocked = false;

    protected $post;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Gdr\UserBundle\Entity\Personage")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $firstPostAuthor;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     */
    protected $isDeleted = false;

    public function __toString(){
        return (string) $this->getTitle();
    }

    public static function getAllStatus(){
        return array(
            self::STATUS_NORMAL => 'Normale',
            self::STATUS_IMPORTANT => 'In evidenza',
            self::STATUS_ANNOUNCE => 'Annuncio'
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
     * Set title
     *
     * @param string $title
     * @return ForumThread
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return ForumThread
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
     * Set isDeleted
     *
     * @param boolean $isDeleted
     * @return ForumThread
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
     * Set category
     *
     * @param \Gdr\GameBundle\Entity\ForumCategory $category
     * @return ForumThread
     */
    public function setCategory(\Gdr\GameBundle\Entity\ForumCategory $category = null)
    {
        $this->category = $category;
    
        return $this;
    }

    /**
     * Get category
     *
     * @return \Gdr\GameBundle\Entity\ForumCategory 
     */
    public function getCategory()
    {
        return $this->category;
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
    public function getReaded()
    {
        return $this->readed;
    }

    /**
     * @param mixed $readed
     */
    public function setReaded($readed)
    {
        $this->readed = $readed;
    }

    /**
     * @return mixed
     */
    public function getReplied()
    {
        return $this->replied;
    }

    /**
     * @param mixed $replied
     */
    public function setReplied($replied)
    {
        $this->replied = $replied;
    }

    /**
     * @return mixed
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * @param mixed $post
     */
    public function setPost($post)
    {
        $this->post = $post;
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
    public function getIsLocked()
    {
        return $this->isLocked;
    }

    /**
     * @param mixed $isLocked
     */
    public function setIsLocked($isLocked)
    {
        $this->isLocked = $isLocked;
    }

    /**
     * Set firstPostAuthor
     *
     * @param \Gdr\UserBundle\Entity\Personage $firstPostAuthor
     * @return ForumThread
     */
    public function setFirstPostAuthor(\Gdr\UserBundle\Entity\Personage $firstPostAuthor = null)
    {
        $this->firstPostAuthor = $firstPostAuthor;
    
        return $this;
    }

    /**
     * Get firstPostAuthor
     *
     * @return \Gdr\UserBundle\Entity\Personage 
     */
    public function getFirstPostAuthor()
    {
        return $this->firstPostAuthor;
    }
}
