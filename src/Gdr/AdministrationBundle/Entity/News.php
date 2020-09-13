<?php

namespace Gdr\AdministrationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * News
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gdr\AdministrationBundle\Entity\NewsRepository")
 */
class News
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
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, unique=true)
     * @Assert\NotBlank(message="Il titolo è obbligatorio.")
     */
    private $title;

    /**
     * @Gedmo\Slug(fields={"title"})
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     * @Assert\NotBlank(message="Il testo è obbligatorio.")
     */
    private $preBody;

    /**
     * @var string
     *
     * @ORM\Column(name="body", type="text")
     * @Assert\NotBlank(message="Il testo è obbligatorio.")
     */
    private $body;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    private $createdAt;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isNews", type="boolean")
     */
    private $isNews;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isArchivio", type="boolean")
     */
    private $isArchivio;


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
     * @return News
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
     * Set body
     *
     * @param string $body
     * @return News
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
     * @return News
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
     * Set isNews
     *
     * @param boolean $isNews
     * @return News
     */
    public function setIsNews($isNews)
    {
        $this->isNews = $isNews;
    
        return $this;
    }

    /**
     * Get isNews
     *
     * @return boolean 
     */
    public function getIsNews()
    {
        return $this->isNews;
    }

    /**
     * Set isArchivio
     *
     * @param boolean $isArchivio
     * @return News
     */
    public function setIsArchivio($isArchivio)
    {
        $this->isArchivio = $isArchivio;
    
        return $this;
    }

    /**
     * Get isArchivio
     *
     * @return boolean 
     */
    public function getIsArchivio()
    {
        return $this->isArchivio;
    }/**
 * @return mixed
 */public function getSlug()
{
    return $this->slug;
}/**
 * @param mixed $slug
 */public function setSlug($slug)
{
    $this->slug = $slug;
}

    /**
     * @return string
     */
    public function getPreBody()
    {
        return $this->preBody;
    }

    /**
     * @param string $preBody
     */
    public function setPreBody($preBody)
    {
        $this->preBody = $preBody;
    }
}