<?php

namespace Gdr\MeteoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MeteoMessage
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gdr\MeteoBundle\Entity\MeteoMessageRepository")
 */
class MeteoMessage
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
     * @ORM\ManyToOne(targetEntity="MeteoCondition", inversedBy="starts")
     * @ORM\JoinColumn(referencedColumnName="id", nullable=false, onDelete="cascade")
     */
    private $start;

    /**
     * @ORM\ManyToOne(targetEntity="MeteoCondition", inversedBy="ends")
     * @ORM\JoinColumn(referencedColumnName="id", nullable=false, onDelete="cascade")
     */
    private $end;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="string", length=255)
     */
    private $message;


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
     * Set message
     *
     * @param string $message
     * @return MeteoMessage
     */
    public function setMessage($message)
    {
        $this->message = $message;
    
        return $this;
    }

    /**
     * Get message
     *
     * @return string 
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set start
     *
     * @param \Gdr\MeteoBundle\Entity\MeteoCondition $start
     * @return MeteoMessage
     */
    public function setStart(\Gdr\MeteoBundle\Entity\MeteoCondition $start = null)
    {
        $this->start = $start;
    
        return $this;
    }

    /**
     * Get start
     *
     * @return \Gdr\MeteoBundle\Entity\MeteoCondition 
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Set end
     *
     * @param \Gdr\MeteoBundle\Entity\MeteoCondition $end
     * @return MeteoMessage
     */
    public function setEnd(\Gdr\MeteoBundle\Entity\MeteoCondition $end = null)
    {
        $this->end = $end;
    
        return $this;
    }

    /**
     * Get end
     *
     * @return \Gdr\MeteoBundle\Entity\MeteoCondition 
     */
    public function getEnd()
    {
        return $this->end;
    }
}