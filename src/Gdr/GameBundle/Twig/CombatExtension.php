<?php

namespace Gdr\GameBundle\Twig;

use JMS\DiExtraBundle\Annotation\Service;
use JMS\DiExtraBundle\Annotation\Tag;
use JMS\DiExtraBundle\Annotation\Inject;
use JMS\DiExtraBundle\Annotation\InjectParams;

/**
 * Class TextExtension
 *
 * @package Gdr\GameBundle\Twig
 * @Service
 * @Tag("twig.extension")
 */
class CombatExtension extends \Twig_Extension
{
    /**
     * @Inject("gdr.combat")
     */
    public $combatService;

    public function getName()
    {
        return 'combat_extension';
    }

    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('combatSet', array($this, 'getLevelName')),
        );
    }

    public function getLevelName($level)
    {
        return $this->combatService->getDescriptionForLevel($level);
    }
}