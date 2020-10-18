<?php

namespace Gdr\GameBundle\Twig;

use JMS\DiExtraBundle\Annotation\Service;
use JMS\DiExtraBundle\Annotation\Tag;
use JMS\DiExtraBundle\Annotation\Inject;

/**
 * @Service()
 * @Tag("twig.extension")
 */
class PathExtension extends \Twig_Extension
{
    /**
     * @Inject("service_container")
     */
    public $container;

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return "path_extension";
    }

    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('uploadPath', array($this, 'generateUploadPath')),
        );
    }

    /**
     * Genera il path per l'immagine.
     *
     * @param null $name
     * @param bool $absolute
     *
     * @return string
     */
    public function generateUploadPath($name, $absolute = false)
    {
        switch ($name) {
            case "enclave":
                $path = $this->container->getParameter('enclave_upload_path') . '/';
                break;

            case "race":
                $path = $this->container->getParameter('race_upload_path') . '/';
                break;

            case "generale":
                $path = $this->container->getParameter('general_upload_path') . '/';
                break;

            case "meteo":
                $path = $this->container->getParameter('meteo_upload_path') . '/';
                break;

            case "personage":
                $path = $this->container->getParameter('personage_upload_path') . '/';
                break;
        }

        if (true === $absolute) {
            $absoluteUrl = $this->container->get('request')->getSchemeAndHttpHost();

            return $absoluteUrl . $path;
        } else {
            return $path;
        }
    }
}