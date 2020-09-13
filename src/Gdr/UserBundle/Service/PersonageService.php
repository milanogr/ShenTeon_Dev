<?php
namespace Gdr\UserBundle\Service;

use Doctrine\Bundle\DoctrineBundle\Registry;
use Doctrine\ORM\EntityNotFoundException;
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
 * Class PersonageService
 *
 * Contiene metodi condivisi per il pg.
 *
 * @DI\Service("gdr.personage", public=true)
 */
class PersonageService
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
     * @param Personage $me
     * @param Personage $other
     * @return null|string
     */
    public function showDiffStrength(Personage $me, Personage $other)
    {
        $myStrength = $me->getStrength();
        $otherStrength = $other->getStrength();
        $diff = $otherStrength - $myStrength;
        $msg = null;

        if ($me == $other) {
            return $msg;
        }

        if ($diff >= 10) {
            $msg = "E' immensamente più prestante di te";
        } elseif ($diff >= 6 && $diff <= 9) {
            $msg = "Sembra che sia molto più prestante di te";
        } elseif ($diff >= 3 && $diff <= 5) {
            $msg = "Sembra che sia piuttosto più prestante di te";
        } elseif ($diff >= 1 && $diff <= 2) {
            $msg = "Sembra che sia leggermente più prestante di te";
        } elseif ($diff == 0) {
            $msg = "Sembra che abbia la tua stessa prestanza fisica";
        } elseif ($diff <= -6 && $diff >= -9) {
            $msg = "Sembra che sia molto meno prestante di te";
        } elseif ($diff <= -3 && $diff >= -5) {
            $msg = "Sembra che sia piuttosto meno prestante di te";
        } elseif ($diff <= -1 && $diff >= -2) {
            $msg = "Sembra che sia leggermente meno prestante di te";
        } elseif ($diff <= -10) {
            $msg = "E' immensamente meno prestante di te";
        }

        return $msg;
    }

    /**
     * @param Personage $personage
     */
    public function canAddLevel(Personage $personage)
    {
        $advanceLevel = $this->em->getRepository('GdrUserBundle:Personage')
            ->canAdvanceRaceLevel($personage->getExperience());

        if (false !== $advanceLevel && $advanceLevel !== $personage->getRaceLevel()) {

            $personage->setRaceLevel($advanceLevel);
            $this->em->flush($personage);

            $msg = '<p>Ti informiamo che l\'Esperienza accumulata per questo Personaggio è sufficiente per passare al
            Livello Razziale successivo. Puoi andare nella sezione "Skill" del tuo Avatar e scegliere una nuova abilità!
            </p>';

            $this->general->createSystemLetter($msg, $personage->getId(), "Gestione");
        }
    }

    public function canAdvanceChatCombatPoint(Personage $personage)
    {
        // Se NON sono guerriero e ho già speso n punti, fermo.
        if (!$this->permission->isWarrior($personage)){
            $pointsUsed = $this->em->getRepository('GdrGameBundle:CombatLearned')
                ->getTotalLearnedForPersonage($personage->getId());
            $pointsUsed = !$pointsUsed ? 0 : $pointsUsed;
            $pointsUnused = $personage->getCombatPoints();
            $totalPoints = $pointsUsed + $pointsUnused;

            // 6 = 2 livelli * 3 punti
            if ($totalPoints >= 6){
                return false;
            }
        }

        $personage->setCombatChatPoints($personage->getCombatChatPoints() + 1);
        $isFighter = $this->permission->isWarrior($personage) || $this->permission->isExWarrior($personage);
        $whenAdd = $isFighter ? 100 : 150;

        if ($personage->getCombatChatPoints() >= $whenAdd) {
            $personage->setCombatChatPoints(0);
            $personage->setCombatPoints($personage->getCombatPoints() + 1);
            $this->em->flush($personage);

            $msg = '<p>Ti informiamo che l\'Esperienza accumulata per questo Personaggio è sufficiente per aumentare
di un livello un Set Combattente. Puoi andare nella sezione "Combattimento" del tuo Avatar e scegliere cosa aumentare!</p>';

            $this->general->createSystemLetter($msg, $personage->getId(), "Gestione");
        }else{
            $this->em->flush($personage);
        }
    }
}