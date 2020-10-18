<?php

namespace Gdr\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * LibrarySection
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gdr\GameBundle\Entity\LibrarySectionRepository")
 * @Vich\Uploadable
 */
class LibrarySection
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="sort", type="integer")
     */
    private $sort;

    /**
     *
     * @ORM\OneToMany(targetEntity="LibraryBook", mappedBy="section")
     */
    private $books;


    /**
     * @Assert\Image()
     * @Vich\UploadableField(mapping="book_image", fileNameProperty="imageName")
     *
     * @var File $image
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imageName;

    /**
     * @var datetime
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isMuseo = false;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isArchivio = false;

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
     * @return LibrarySection
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
     * Set sort
     *
     * @param integer $sort
     * @return LibrarySection
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
     * Constructor
     */
    public function __construct()
    {
        $this->books = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString(){
        return (is_null($this->getId())) ? "Nuova" : $this->getName();
    }
    /**
     * Add books
     *
     * @param \Gdr\GameBundle\Entity\LibraryBook $books
     * @return LibrarySection
     */
    public function addBook(\Gdr\GameBundle\Entity\LibraryBook $books)
    {
        $this->books[] = $books;
    
        return $this;
    }

    /**
     * Remove books
     *
     * @param \Gdr\GameBundle\Entity\LibraryBook $books
     */
    public function removeBook(\Gdr\GameBundle\Entity\LibraryBook $books)
    {
        $this->books->removeElement($books);
    }

    /**
     * Get books
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBooks()
    {
        return $this->books;
    }

    /**
     * @return \Gdr\GameBundle\Entity\datetime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \Gdr\GameBundle\Entity\datetime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
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

        if ($image instanceof UploadedFile){
            $this->setUpdatedAt(new \DateTime());
        }
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

    /**
     * @return mixed
     */
    public function getIsArchivio()
    {
        return $this->isArchivio;
    }

    /**
     * @param mixed $isArchivio
     */
    public function setIsArchivio($isArchivio)
    {
        $this->isArchivio = $isArchivio;
    }
}
