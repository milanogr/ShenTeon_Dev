<?php

namespace Gdr\GameBundle\Twig;

use JMS\DiExtraBundle\Annotation\Service;
use JMS\DiExtraBundle\Annotation\Tag;

/**
 * Class TextExtension
 *
 * @package Gdr\GameBundle\Twig
 * @Service
 * @Tag("twig.extension")
 */
class TextExtension extends \Twig_Extension
{

    public function getName()
    {
        return 'text_extension';
    }

    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('truncate', array($this, 'truncateFilter')),
        );
    }

    public function truncateFilter($value, $length = 30, $separator = '...')
    {
        if (strlen($value) > $length) {
            return rtrim(substr($value, 0, $length)) . $separator;
        }

        return $value;
    }
}