<?php
namespace Gdr\UserBundle\Service;

use Doctrine\Bundle\DoctrineBundle\Registry;
use Doctrine\ORM\EntityNotFoundException;
use Gdr\GameBundle\Entity\CombatLearned;
use Gdr\GameBundle\Entity\CombatSet;
use Gdr\GameBundle\Entity\Location;
use Gdr\GameBundle\Entity\Transaction;
use Gdr\GameBundle\Entity\TransactionType;
use Gdr\ItemsBundle\Entity\Item;
use Gdr\ItemsBundle\Entity\Property;
use Gdr\UserBundle\Entity\Personage;
use Gdr\UserBundle\Entity\Referrer;
use Gdr\UserBundle\Entity\User;
use JMS\DiExtraBundle\Annotation\Inject;
use JMS\DiExtraBundle\Annotation\InjectParams;
use JMS\DiExtraBundle\Annotation\Service;
use JMS\DiExtraBundle\Annotation as DI;
use Symfony\Component\Debug\Exception\FatalErrorException;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class CombatService
 *
 * Contiene metodi condivisi per il pg.
 *
 * @DI\Service("gdr.combat", public=true)
 */
class CombatService
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

    /**
     * @Inject("gdr.permission")
     * @var \Gdr\GameBundle\Permission
     */
    public $permission;

    /**
     * Torna il numero di set imparabili in base al livello combattimento del pg.
     */
    public function getTotalSetsLearnable(Personage $personage)
    {
        $actual = $personage->getCombatLevel() + 1;
        // CASO NON COMBATTENTE / EX può aumentare solo se minore di 2.
        if (!$this->permission->isWarrior($personage)){
            return $actual > 2 ? false : true;
        }

        // Il combattente impara al massimo 6 set.
        if ($this->permission->isWarrior($personage)){
            return $actual > 6 ? false : true;
        }
    }

    public function getDescriptionForLevel($level)
    {
        $array = array(
            0 => "Nessuna Competenza",
            1 => "Competenza basilare",
            2 => "Competenza avanzata",
            3 => "Competenza molto avanzata",
            4 => "Competenza approfondita",
            5 => "Maestria",
            6 => "Competenza perfetta"
        );

        return $array[$level];
    }

    public function canAdvanceCombatLevel(Personage $personage)
    {
        // CASO NON COMBATTENTE / EX può aumentare solo se minore di 2.
        if (!$this->permission->isWarrior($personage)){
            return $personage->getCombatLevel() < 2;
        }

        // Il combattente aumenta fino al 6.
        if ($this->permission->isWarrior($personage)){
            return $personage->getCombatLevel() < 6;
        }
    }

    /**
     * @param Personage $personage
     * @param CombatLearned $set
     * @return bool
     */
    public function canAdvanceSet(Personage $personage, CombatLearned $set)
    {
        // CASO NON COMBATTENTE / EX.
        if (!$this->permission->isWarrior($personage)){
            return $set->getSetLevel() < 3;
        }

        // Il combattente può.
        return true;
    }

    /**
     * @param Personage $personage
     * @return bool
     *
     * Devo controllare:
     * - il livello (livello + 1) = max set usabili
     * - non combattente/ex combattente ) max 3 set usabili
     */
    public function canLearnNewSet(Personage $personage){
        $total = $this->em->getRepository('GdrGameBundle:CombatLearned')
            ->getTotalLearnedForPersonage($personage->getId());

        // CASO NON COMBATTENTE / EX può avere max 3 set
        if (!$this->permission->isWarrior($personage)){

            $max = $personage->getCombatLevel() + 1;

            if ($max > 3){
                $max = 3;
            }

            return $total < $max;
        }

        // Il combattente impara al massimo 7 set.
        if ($this->permission->isWarrior($personage)){
            $max = $personage->getCombatLevel() + 1;
            return $total < $max;
        }
    }

    public function getPointsToUp(Personage $personage){
        $isFighter = $this->permission->isWarrior($personage) || $this->permission->isExWarrior($personage);
        $whenAdd = $isFighter ? 100 : 150;

        return $whenAdd - $personage->getCombatChatPoints();
    }
}