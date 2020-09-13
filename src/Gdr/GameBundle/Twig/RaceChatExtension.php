<?php

namespace Gdr\GameBundle\Twig;

use Gdr\RaceBundle\Entity\Race;
use JMS\DiExtraBundle\Annotation\Service;
use JMS\DiExtraBundle\Annotation\Tag;
use JMS\DiExtraBundle\Annotation\Inject;

/**
 * @Service()
 * @Tag("twig.extension")
 */
class RaceChatExtension extends \Twig_Extension
{

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
        return "race_chat_extension";
    }

    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('raceChat', array($this, 'raceChatFilter')),
        );
    }

    /**
     * @param $string
     * @param $race
     *
     * @return mixed
     */
    public function raceChatFilter($string, Race $race)
    {
        $learned = $this->general->em->getRepository('GdrUserBundle:Language')
            ->getLanguagesByPersonageAndRaceWithCache($this->general->getPersonage()->getId(), $race->getId());

        if (!$learned) {
            $newString = preg_replace_callback(
                "#([^<]+)<i>#",
                function ($match) {
                    $length = strlen($match[0]);
                    if ($length <= 10) {
                        return " [Senti delle parole che non conosci, il discorso sembra molto breve] ";
                    } elseif ($length > 10 && $length <= 50) {
                        return " [Senti delle parole che non conosci, il discorso sembra breve] ";
                    } else {
                        return " [Senti delle parole che non conosci, il discorso sembra lungo] ";
                    }
                },
                $string
            );

            $newString = preg_replace_callback(
                "#</i>([^>]+)#",
                function ($match) {
                    $length = strlen($match[0]);
                    if ($length <= 10) {
                        return " [Senti delle parole che non conosci, il discorso sembra molto breve] ";
                    } elseif ($length > 10 && $length <= 50) {
                        return " [Senti delle parole che non conosci, il discorso sembra breve] ";
                    } else {
                        return " [Senti delle parole che non conosci, il discorso sembra lungo] ";
                    }
                },
                $newString
            );

            // Non ho fatto modifiche, per cui posso sostituirla per intero.
            if ($newString == $string) {
                $length = strlen($string);
                if ($length <= 10) {
                    return " [Senti delle parole che non conosci, il discorso sembra molto breve] ";
                } elseif ($length > 10 && $length <= 50) {
                    return " [Senti delle parole che non conosci, il discorso sembra breve] ";
                } else {
                    return " [Senti delle parole che non conosci, il discorso sembra lungo] ";
                }
            }

            return "<strong>(In Lingua {$race->getName()})</strong> " . str_replace("< ", " ", $newString);
        }

        return "<strong>(In Lingua {$race->getName()})</strong> " . $string;
    }
}