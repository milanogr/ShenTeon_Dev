<?php

namespace Gdr\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Test
 *
 * @ORM\Table()
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Test
{
    private $temp;

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

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $path;

    /**
     * @Assert\Image()
     */
    protected $file;

    // ---------------------------------------------
    public function getAbsolutePath()
    {
        return null === $this->path
            ? null
            : $this->getUploadRootDir().'/'.$this->path;
    }

    public function getWebPath()
    {
        return null === $this->path
            ? null
            : $this->getUploadDir().'/'.$this->path;
    }

    protected function getUploadRootDir()
    {
        // il percorso assoluto della cartella dove i
        // documenti caricati verranno salvati
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // togliamo __DIR_ in modo da visualizzare
        // correttamente nella vista il file caricato
        return 'uploads/test';
    }

    /**
     * Imposta il file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
        // verifica se abbiamo un percorso di immagine vecchio
        if (isset($this->path)) {
            // memorizza il vecchio nome da cancellare dopo l'aggiornamento
            $this->temp = $this->path;
            $this->path = null;
        } else {
            $this->path = 'initial';
        }
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
        if (null !== $this->getFile()) {
            // fare qualsiasi cosa si voglia per generare un nome univoco
            $filename = sha1(uniqid(mt_rand(), true));
            $this->path = $filename.'.'.$this->file->guessExtension();
        }
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        if (null === $this->getFile()) {
            return;
        }

        // se si verifica un errore mentre il file viene spostato viene
        // lanciata automaticamente un'eccezione da move(). Questo eviterà
        // la memorizzazione dell'entità nella base dati in caso di errore
        $this->getFile()->move($this->getUploadRootDir(), $this->path);

        // verifica se abbiamo una vecchia immagine
        if (isset($this->temp)) {
            // elimina la vecchia immagine
            unlink($this->getUploadRootDir().'/'.$this->temp);
            // pulisce il percorso temporaneo dell'immagine
            $this->temp = null;
        }
        $this->file = null;
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
        if ($file = $this->getAbsolutePath()) {
            unlink($file);
        }
    }
    // ---------------------------------------------

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
     * @return Test
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
     * Set path
     *
     * @param string $path
     * @return Test
     */
    public function setPath($path)
    {
        $this->path = $path;
    
        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @return mixed
     */
    public function getFile()
    {
        return $this->file;
    }
}
