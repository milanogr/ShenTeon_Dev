<?php

namespace Gdr\GameBundle\Entity\Wise;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * WiseSentence
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gdr\GameBundle\Entity\Wise\WiseSentenceRepository")
 *
 */
class WiseSentence
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
     * @ORM\Column(name="body", type="text")
     * @Assert\NotBlank()
     */
    private $body;

    /**
     * @ORM\ManyToMany(targetEntity="Gdr\GameBundle\Entity\Wise\WiseTag", fetch="EAGER", inversedBy="sentences")
     * @ORM\JoinTable(name="Wise_Sentence_Tag")
     **/
    private $tags;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    private $createdAt;

    public function __toString()
    {
        return $this->getBody()  ?? '';;
    }

    public function __construct(){
        $this->tags = new ArrayCollection();
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
     * Set body
     *
     * @param string $body
     *
     * @return WiseSentence
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
     * Add tag
     *
     * @param \Gdr\GameBundle\Entity\Wise\WiseTag $tag
     *
     * @return WiseSentence
     */
    public function addTag(\Gdr\GameBundle\Entity\Wise\WiseTag $tag)
    {
        $this->tags[] = $tag;

        return $this;
    }

    /**
     * Remove tag
     *
     * @param \Gdr\GameBundle\Entity\Wise\WiseTag $tag
     */
    public function removeTag(\Gdr\GameBundle\Entity\Wise\WiseTag $tag)
    {
        $this->tags->removeElement($tag);
    }

    /**
     * Get tags
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTags()
    {
        return $this->tags;
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
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;
    }
}
