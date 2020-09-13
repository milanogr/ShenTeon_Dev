<?php

namespace Gdr\GameBundle\Entity\Wise;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * WiseTag
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gdr\GameBundle\Entity\Wise\WiseTagRepository")
 */
class WiseTag
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
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity="Gdr\GameBundle\Entity\Wise\WiseSentence", mappedBy="tags")
     **/
    private $sentences;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    private $createdAt;

    public function __construct()
    {
        $this->tags = new ArrayCollection();
    }

    public function __toString(){
        return $this->getName() ? $this->getName() : 'Tag';
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
     * @return WiseTag
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
     * Add sentence
     *
     * @param \Gdr\GameBundle\Entity\Wise\WiseSentence $sentence
     *
     * @return WiseTag
     */
    public function addSentence(\Gdr\GameBundle\Entity\Wise\WiseSentence $sentence)
    {
        $this->sentences[] = $sentence;

        return $this;
    }

    /**
     * Remove sentence
     *
     * @param \Gdr\GameBundle\Entity\Wise\WiseSentence $sentence
     */
    public function removeSentence(\Gdr\GameBundle\Entity\Wise\WiseSentence $sentence)
    {
        $this->sentences->removeElement($sentence);
    }

    /**
     * Get sentences
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSentences()
    {
        return $this->sentences;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }
}
