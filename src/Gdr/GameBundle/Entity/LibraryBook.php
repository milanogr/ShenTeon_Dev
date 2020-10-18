<?php

namespace Gdr\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
/**
 * LibraryBook
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gdr\GameBundle\Entity\LibraryBookRepository")
 * @Vich\Uploadable
 */
class LibraryBook
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="author", type="string", length=255)
     */
    private $author;

    /**
     * @var integer
     *
     * @ORM\Column(name="sort", type="integer")
     */
    private $sort = 1;

    /**
     * @var string
     *
     * @ORM\Column(name="body", type="text")
     */
    private $body;

    /**
     * @Assert\Image()
     * @Vich\UploadableField(mapping="book_image", fileNameProperty="imageName")
     *
     * @var File $image
     */
    protected $image;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $imageName;

    /**
     * @ORM\ManyToOne(targetEntity="LibrarySection", inversedBy="books")
     * @ORM\JoinColumn(name="section_id", referencedColumnName="id", nullable=false, onDelete="cascade")
     */
    private $section;

    /**
     * @var datetime
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $updatedAt;

    public function __toString(){
        return (is_null($this->getId())) ? "Nuovo" : $this->getTitle();
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
     * @return LibraryBook
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
     * Set author
     *
     * @param string $author
     * @return LibraryBook
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    
        return $this;
    }

    /**
     * Get author
     *
     * @return string 
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set body
     *
     * @param string $body
     * @return LibraryBook
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
     * Set imageName
     *
     * @param string $imageName
     * @return LibraryBook
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
     * Set section
     *
     * @param \Gdr\GameBundle\Entity\LibrarySection $section
     * @return LibraryBook
     */
    public function setSection(\Gdr\GameBundle\Entity\LibrarySection $section)
    {
        $this->section = $section;
    
        return $this;
    }

    /**
     * Get section
     *
     * @return \Gdr\GameBundle\Entity\LibrarySection 
     */
    public function getSection()
    {
        return $this->section;
    }

    /**
     * Set sort
     *
     * @param integer $sort
     * @return LibraryBook
     */
    public function setSort($sort)
    {
        $this->sort = $sort;
    
        return $this;
    }

    /**
     * Get sort
     *
     * @return integer 
     */
    public function getSort()
    {
        return $this->sort;
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
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return LibraryBook
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
     * @return mixed
     */
    public function getIsMuseo()
    {
        return $this->isMuseo;
    }

    /**
     * @param mixed $isMuseo
     */
    public function setIsMuseo($isMuseo)
    {
        $this->isMuseo = $isMuseo;
    }
}
