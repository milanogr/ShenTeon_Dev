<?php

namespace Gdr\AvatarBundle\Controller;

use Doctrine\ORM\EntityNotFoundException;
use Gdr\GameBundle\Entity\CombatLearned;
use Gdr\UserBundle\Controller\Controller;
use Gdr\UserBundle\Entity\Skill;
use Gdr\UserBundle\Entity\SkillLearned;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class CombatController extends Controller
{
    public function indexAction()
    {
        $sets = $this->getDoctrine()->getRepository('GdrGameBundle:CombatSet')
            ->getSetsByPersonage($this->getPersonage()->getId());

        $points = $this->get('gdr.combat')->getPointsToUp($this->getPersonage());

        return $this->render(
            'GdrAvatarBundle:Combat:index.html.twig',
            array(
                'sets' => $sets,
                'personage' => $this->getPersonage(),
                'points' => $points
            )
        );
    }

    public function levelUpAction($id)
    {
        $personage = $this->getPersonage();
        $combatService = $this->get('gdr.combat');
        $combatSet = $this->getDoctrine()->getRepository('GdrGameBundle:CombatSet')->find($id);

        if (null === $combatSet) {
            return new JsonResponse(array(
                'response' => false
            ));
        }

        // Ho punti da spendere?
        if (!$personage->getCombatPoints()) {
            return new JsonResponse(array(
                'response' => false,
                'msg' => "Non hai abbastanza Esperienza Combattente per poter migliorare questa abilità."
            ));
        }

        $em = $this->getDoctrine()->getManager();
        $personage->setCombatPoints($personage->getCombatPoints() - 1);

        $set = $this->getDoctrine()->getRepository('GdrGameBundle:CombatLearned')
            ->findOneBy(array(
                'personage' => $personage,
                'combatSet' => $combatSet
            ));

        if (null === $set) {

            // Posso imparare questo Set?
            if (!$combatService->canLearnNewSet($personage)){
                return new JsonResponse(array(
                    'response' => false,
                    'msg' => "Non puoi imparare nuovi Set con il tuo Livello di Combattimento attuale."
                ));
            }

            $set = new CombatLearned();
            $set->setPersonage($personage);
            $set->setCombatSet($combatSet);
        }

        // Raggiunto il livello 6?
        if ($set->getSetLevel() >= 6) {
            return new JsonResponse(array(
                'response' => false,
                'msg' => "Hai già raggiunto la massima conoscenza per questo Set."
            ));
        }

        // Posso imparare/aumentare questo SET?
        if (!$combatService->canAdvanceSet($personage, $set)){
            return new JsonResponse(array(
                'response' => false,
                'msg' => "Hai già raggiunto la massima conoscenza per questo Set. Per progredire ulteriormente devi essere addestrato da un'Enclave Combattente."
            ));
        }

        // Ok, vado avanti.
        $set->setSetLevel($set->getSetLevel() + 1);
        $em->persist($personage);
        $em->persist($set);
        $em->flush();

        // Aumento di livello se sblocco il terzo livello di SET.
        if ($set->getSetLevel() == 3 && $combatService->canAdvanceCombatLevel($personage)){
            $personage->setCombatLevel($personage->getCombatLevel() + 1);
            $em->persist($personage);
            $em->flush();

            $msg = "<p>Ti informiamo che il tuo Livello Combattente, grazie alla tua costanza, è aumentato.</p>";
            $this->get('gdr.game_bundle.general')->createSystemLetter($msg, $personage->getId(), "Gestione");
        }

        return new JsonResponse(array(
            'response' => true,
            'msg' => "La tua competenza nel Set scelto è aumentata."
        ));
    }
}