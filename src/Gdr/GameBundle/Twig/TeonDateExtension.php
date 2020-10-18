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
class TeonDateExtension extends \Twig_Extension
{

    public function getName()
    {
        return 'teon_date_extension';
    }

    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('teon_date', array($this, 'teonDateFilter')),
        );
    }

    public function teonDateFilter($value, $showActualYear = false)
    {
        list($day, $month, $year) = explode("/", $value);

        $yearTeon = $year - 1664;

        if ($showActualYear){
            return $day . "/" . $month . "/" . $yearTeon . " (".$year.")";
        }else{
            return $day . "/" . $month . "/" . $yearTeon;
        }
    }
}