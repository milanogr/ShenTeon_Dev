<?php

namespace Gdr\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TransactionType
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class TransactionType
{
    const TRANSFER  = 1;
    const CREDIT    = 2;
    const MARKET    = 3;
    const DEPOSITO  = 4;
    const PRELIEVO  = 5;
    const PASSAGGIO = 6;
    const ERARIO    = 7;

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
     */
    protected $name;

    public function __toString()
    {
        return (string)$this->getName();
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
     * @return TransactionType
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
}
