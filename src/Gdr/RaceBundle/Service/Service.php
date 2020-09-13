<?php

namespace Gdr\RaceBundle\Service;

use Doctrine\ORM\EntityNotFoundException;
use Gdr\AvatarBundle\Entity\Experience;
use Gdr\ItemsBundle\Entity\Inventory;
use Gdr\UserBundle\Entity\Gravestone;
use JMS\DiExtraBundle\Annotation as DI;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Gdr\UserBundle\Entity\Personage as Personage;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Class Generator
 *
 * @DI\Service("gdr.race.service", public=true)
 */
class Service
{
    /**
     * \Doctrine\Bundle\DoctrineBundle\Registry
     */
    private $doctrine;

    /**
     * @var \Gdr\GameBundle\General
     */
    private $general;

    /**
     * @var
     */
    private $templating;

    /**
     * @DI\InjectParams({
     *     "em" = @DI\Inject("doctrine"),
     *     "general" = @DI\Inject("gdr.game_bundle.general"),
     *     "templating" = @DI\Inject("templating")
     * })
     */

    public function __construct($doctrine, $general, $templating)
    {
        $this->doctrine = $doctrine;
        $this->general = $general;
        $this->templating = $templating;
    }

    /**
     * @return \Doctrine\Bundle\DoctrineBundle\Registry
     */
    protected function getDoctrine()
    {
        return $this->doctrine;
    }

    /** @return \Symfony\Bundle\TwigBundle\Debug\TimedTwigEngine */
    protected function getTemplating()
    {
        return $this->templating;
    }

    /**
     * @return \Gdr\GameBundle\General
     */
    protected function getGeneral()
    {
        return $this->general;
    }

    public function useItem(Personage $pg, $age)
    {
        $em = $this->getDoctrine()->getManager();
        $rl_rep = $this->getDoctrine()->getRepository("GdrRaceBundle:RaceLevel");
        $race = $pg->getRace();

        $new_age = $pg->getAge() - $age;
        $pg->setAge($new_age);

        $race_level = $rl_rep->findByAgeAndRaceId($new_age, $race);
        $pg->setSkillsLevel($race_level);

        $em->persist($pg);
        $em->flush();
    }

    public function fateRebornPersonage(Personage $pg)
    {
        $pg->setDeadAt(null);
        $pg->setIsDead(false);
        $pg->setIsSpecialDeath(false);
        $pg->setIsSuicide(false);
        $em = $this->getDoctrine()->getManager();
        $em->persist($pg);
        $em->flush();

        $this->addExperience($pg, strtoupper($pg->getName()) . " da oggi torna a camminare tra i vivi.");
    }

    public function rebornPersonage(Personage $pg, $age, $flush = true, $isNew = false)
    {
        $rl_rep = $this->getDoctrine()->getRepository("GdrRaceBundle:RaceLevel");
        $race = $pg->getRace();

        $pg->setAge($age);
        //$pg->getLastBirthday(new \DateTime());
        $pg->setDeadAt(null);
        $pg->setIsDead(false);
        $pg->setIsSpecialDeath(false);
        $pg->setIsSuicide(false);

        $race_level = $rl_rep->findByAgeAndRaceId($age, $race);

        if (null == $race_level){
            throw new EntityNotFoundException("Manca il Race Level");
        }

        if ($isNew) {
            $pg->setSkillsLevel($race_level);
        } else {
            if (!is_null($race_level) && $race_level->getId() != $pg->getSkillsLevel()->getId()) {
                $pg->setSkillsLevel($race_level);
            }
        }

        if ($flush) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($pg);
            $em->flush();

            return $pg;
        } else {
            return $pg;
        }
    }


    public function buildLapide(Personage $pg, $msg = null, $family = false)
    {
        $em = $this->getDoctrine()->getManager();

        $lapide = new Gravestone();
        $lapide->setNickname($pg->getName());
        $lapide->setSurname($pg->getSurname()->getValue());
        $lapide->setInFamilyGrave($family);
        $lapide->setMessage($msg);
        $lapide->setDeathAt(new \DateTime());

        /**
         * Controllo se il pg è sposato
         */
        $marriage = $em->getRepository("GdrUserBundle:Wedding")->findActiveMarriageByPersonage($pg);
        if (!is_null($marriage)) {
            $exp = new Experience();
            if ($marriage->getBride()->getId() == $pg->getId()) {
                $widow = $marriage->getGroom();
                $marriage->setIsMaleWidow(true);
                $exp->setPersonage($widow);
                $exp->setBody($widow->getName() . " rimane vedovo/a di " . $pg->getName());
            } else {
                $widow = $marriage->getBride();
                $marriage->setIsFemaleWidow(true);
                $exp->setPersonage($widow);
                $exp->setBody($widow->getName() . " rimane vedovo/a di " . $pg->getName());
            }
            $marriage->setIsDivorced(true);
            $widow->setWidowOf($pg->getName());
            $em->persist($widow);
            $em->persist($marriage);
        }
        $em->persist($lapide);
        $em->flush();

        return true;
    }

    public function clearPersonage(Personage $pg, $flush = false)
    {
        $em = $this->getDoctrine()->getManager();

        $items = $this->getDoctrine()->getRepository("GdrItemsBundle:Inventory")->findItemsToRemoveOnNewPersonage($pg);
        foreach ($items as $item):
            $em->remove($item);
        endforeach;
        $em->flush();

        $this->getDoctrine()->getRepository("GdrItemsBundle:Property")->deletePropertiesToRemoveOnNewPersonage($pg);

        $pg->setCombatLevel(0);
        $pg->setBankAmount(0);
        $pg->setBagAmount(0);
        $pg->setTitle(null);
        $pg->setMarriedWith(null);
        $pg->setStatus(null);

        if ($flush) {
            $em = $this->getDoctrine()->getManager();
            $em->flush($pg);

            return true;
        } else {
            return $pg;
        }
    }

    public function clearChiavi(Personage $pg)
    {
        $em = $this->getDoctrine()->getManager();
        $items = $this->getDoctrine()->getRepository("GdrItemsBundle:Inventory")->findItemsToRemoveOnDeath($pg);
        foreach ($items as $item):
            $em->remove($item);
        endforeach;
        $em->flush();

        return true;
    }

    public function killPersonage(Personage $pg, $isSuicide = false, $isTooOld = false, $addExp = true)
    {
        $em = $this->getDoctrine()->getManager();

        $pg->setDeadAt(new \DateTime());
        $pg->setLastDeadAt(new \DateTime());
        $pg->setIsDead(true);

        if ($isSuicide) {
            $pg->setIsSuicide(true);
            if ($addExp) {
                $this->addExperience($pg, strtoupper($pg->getName()) . " è deceduto in data odierna per suicidio.");
            }
        } elseif ($isTooOld) {
            if ($addExp) {
                $this->addExperience($pg, strtoupper($pg->getName()) . " è deceduto in data odierna per vecchiaia.");
            }
        } else {
            $pg->setIsSpecialDeath(true);
            if ($addExp) {
                $this->addExperience($pg, strtoupper($pg->getName()) . " è deceduto in data odierna.");
            }
        }

        $em->persist($pg);
        $em->flush();

        $letter = $this->renderView('@GdrUser/Default/deadPg.html.twig');
        $this->getGeneral()->createSystemLetter($letter, $pg->getId(), 'Gestione');

        return true;
    }

    public function handleAgeing(Personage $pg)
    {
        $rl_rep = $this->getDoctrine()->getRepository("GdrRaceBundle:RaceLevel");
        $em = $this->getDoctrine()->getManager();

        $pg_id = $pg->getId();
        $age = $pg->getAge() + 1;
        $pg->setAge($age);

        $text = "<p>La Signoria di Teon, in occasione del Vostro Genetliaco, Vi porge i Suoi sentiti auguri!</p>";

        $race = $pg->getRace();
        if ($age >= $race->getAgeDeath()) {
            $rand = rand(0, 100);
            if ($rand % 3 == 0) {
                // Personaggio morto.
                $this->killPersonage($pg, false, true);
            }
        } else {
            $race_level = $rl_rep->findByAgeAndRaceId($age, $race);
            if (!is_null($race_level) && $race_level->getId() != $pg->getSkillsLevel()->getId()) {
                $pg->setSkillsLevel($race_level);
                $text .= "<p>Vi informiamo che la fascia d'età del Vostro Personaggio è cambiata. Di conseguenza potrebbero essere cambiate anche le sue caratteristiche di Forza e Saggezza. Vi chiediamo di verificarle e di tenerne conto.</p>";
            }
        }

        $pg->setLastBirthday(new \DateTime());
        $em->persist($pg);
        $em->flush();
        $sl = $this->getGeneral()->createSystemLetter($text, $pg_id, "Gestione");
    }

    public function generateBaseInventory(Personage $personage)
    {
        $items = $this->getDoctrine()->getRepository('GdrItemsBundle:Item')
            ->getBaseItemsForInventory();

        $em = $this->getDoctrine()->getManager();

        foreach ($items as $item) {
            $inv = new Inventory();
            $inv->setPersonage($personage);
            $inv->setItem($item);
            $inv->setIsEquipped(true);

            if ($item->getDurationDays()) {
                $inv->setExpireAt(new \DateTime("+{$item->getDurationDays()} days"));
            }

            if ($item->getName() == 'Abito da viandante') {
                $inv->setIsDressed(true);
            }

            $em->persist($inv);
        }

        $personage->setBagAmount(500);
        $personage->setBankAmount(500);
        $em->persist($personage);
        $em->flush();
    }

    public function resetSkills(Personage $pg)
    {
        $skillsLearned = $this->getDoctrine()->getRepository('GdrUserBundle:SkillLearned')
            ->deleteSkillsByPersonage($pg->getId());
    }

    public function addExperience(Personage $pg, $text)
    {
        $exp = new Experience();
        $exp->setPersonage($pg);
        $exp->setBody($text);
        $this->getDoctrine()->getManager()->persist($exp);
        $this->getDoctrine()->getManager()->flush();

        return $exp;
    }

    public function renderView($view, array $parameters = array())
    {
        return $this->getTemplating()->render($view, $parameters);
    }
}