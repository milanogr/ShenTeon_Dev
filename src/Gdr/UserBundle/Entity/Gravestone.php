<?php

namespace Gdr\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Gravestone
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gdr\UserBundle\Entity\GravestoneRepository")
 */
class Gravestone
{
    const DF = "D.F.";
    const PF = "P.F";

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
     * @ORM\Column(name="nickname", type="string", length=255)
     */
    private $nickname;

    /**
     * @var string
     *
     * @ORM\Column(name="surname", type="string", length=255)
     */
    private $surname;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="deathAt", type="date")
     */
    private $deathAt;

    /**
     * @var integer
     *
     * @ORM\Column(name="deathAge", type="integer")
     */

    private $deathAge = 0;

    /**
     * @var boolean
     *
     * @ORM\Column(name="inFamilyGrave", type="boolean", nullable=true)
     */
    private $inFamilyGrave;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="string", length=255, nullable=true)
     */
    private $message;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $typeYear;

    public static function getTypeYears(){
        return array(
            self::PF => self::PF,
            self::DF => self::DF
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
     * Set nickname
     *
     * @param string $nickname
     * @return Gravestone
     */
    public function setNickname($nickname)
    {
        $this->nickname = $nickname;
    
        return $this;
    }

    /**
     * Get nickname
     *
     * @return string 
     */
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * Set surname
     *
     * @param string $surname
     * @return Gravestone
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
    
        return $this;
    }

    /**
     * Get surname
     *
     * @return string 
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set deathAt
     *
     * @param \DateTime $deathAt
     * @return Gravestone
     */
    public function setDeathAt($deathAt)
    {
        $this->deathAt = $deathAt;
    
        return $this;
    }

    /**
     * Get deathAt
     *
     * @return \DateTime 
     */
    public function getDeathAt()
    {
        return $this->deathAt;
    }

    /**
     * Set inFamilyGrave
     *
     * @param boolean $inFamilyGrave
     * @return Gravestone
     */
    public function setInFamilyGrave($inFamilyGrave)
    {
        $this->inFamilyGrave = $inFamilyGrave;
    
        return $this;
    }

    /**
     * Get inFamilyGrave
     *
     * @return boolean 
     */
    public function getInFamilyGrave()
    {
        return $this->inFamilyGrave;
    }

    /**
     * Set message
     *
     * @param string $message
     * @return Gravestone
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
     * Set deathAge
     *
     * @param integer $deathAge
     * @return Gravestone
     */
    public function setDeathAge($deathAge)
    {
        $this->deathAge = $deathAge;
    
        return $this;
    }

    /**
     * Get deathAge
     *
     * @return integer 
     */
    public function getDeathAge()
    {
        return $this->deathAge;
    }

    /**
     * @param mixed $typeYear
     */
    public function setTypeYear($typeYear)
    {
        $this->typeYear = $typeYear;
    }

    /**
     * @return mixed
     */
    public function getTypeYear()
    {
        return $this->typeYear;
    }
}