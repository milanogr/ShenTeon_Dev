<?php

namespace Gdr\GameBundle\Twig;

use JMS\DiExtraBundle\Annotation\Service;
use JMS\DiExtraBundle\Annotation\Tag;
use JMS\DiExtraBundle\Annotation\Inject;
/**
 * @Service()
 * @Tag("twig.extension")
 */
class ChatExtension extends \Twig_Extension {

    /**
     * @Inject("gdr.game_bundle.general")
     * @var \Gdr\GameBundle\General
     */
    public $general;

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return "chat_extension";
    }

    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('normalChat', array($this, 'normalChatFilter')),
        );
    }

    /**
     * Formatta il testo per un'azione normale, trasformando in entità html e mostrando il corsivo per la parte
     * in terza persona.
     *
     * @param $string
     *
     * @return mixed
     */
    public function normalChatFilter($string)
    {
        $string = htmlentities($string, ENT_QUOTES);
        $string = preg_replace("#&lt;(.+?)&gt;#s", "<i>«$1»</i>", $string);

        $name = $this->general->getPersonage()->getName();

        $string = str_ireplace($name, "<span class='my-name'>{$name}</span>", $string);

        return $string;
    }
}