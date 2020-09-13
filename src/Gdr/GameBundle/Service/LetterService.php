<?php

namespace Gdr\GameBundle\Service;

use JMS\DiExtraBundle\Annotation\Inject;
use JMS\DiExtraBundle\Annotation\InjectParams;
use JMS\DiExtraBundle\Annotation\Service;
use JMS\DiExtraBundle\Annotation as DI;
/**
 * Class Erario
 *
 * Contiene metodi condivisi per l'erario e la proprietà.
 *
 * @DI\Service("gdr.letter", public=true)
 */
class LetterService
{
    /**
     * @Inject("doctrine.orm.entity_manager")
     * @var \Doctrine\ORM\EntityManager
     */
    public $em;

    /**
     * @Inject("gdr.game_bundle.general")
     * @var \Gdr\GameBundle\General
     */
    public $general;

    const MONTH_TO_REMOVE = 2;

    public function realRemoveOldLetters(){

        $before = new \DateTime("- ".self::MONTH_TO_REMOVE." month");

        $this->em->getRepository('GdrGameBundle:Letter')
            ->reallyDeleteBefore($before);
    }

    public function removeReadedBefore(\DateTime $date){

        return $this->em->getRepository('GdrGameBundle:Letter')
            ->reallyDeleteBefore($date);
    }

    public function removeNotReadedBefore(\DateTime $date){

        return $this->em->getRepository('GdrGameBundle:Letter')
            ->reallyDeleteNotReadedBefore($date);
    }

    public function removeSpecialOldest(\DateTime $date){

        return $this->em->getRepository('GdrGameBundle:Letter')
            ->reallyDeleteSpecialOldest($date);
    }
}