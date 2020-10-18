<?php

namespace Gdr\GameBundle\Service;


class ChanceGenerator
{

    /**
     * Dato un intero da 1 a 100 calcola la probabilità.
     *
     * @param $chance int >= 1 && <= 100
     * @return bool
     */
    public function generate($chance)
    {
        $randomNumber = mt_rand(1, 100);

        if ($randomNumber <= $chance){
            return true;
        }

        return false;
    }

}