<?php

namespace Gdr\AvatarBundle\Controller;

use Doctrine\ORM\EntityNotFoundException;
use Gdr\UserBundle\Controller\Controller;
use Gdr\UserBundle\Entity\Skill;
use Gdr\UserBundle\Entity\SkillLearned;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class SkillController extends Controller
{
    public function indexAction()
    {
        $personage = $this->getPersonage();
        $maxLevel = Skill::MAX_LEVEL;

        return $this->render(
            'GdrAvatarBundle:Skill:index.html.twig',
//        'GdrGameBundle:Default:profiler.html.twig',
            array(
                'raceLevel' => $personage->getRaceLevel(),
                'maxLevel' => $maxLevel
            )
        );
    }

    public function showSkillsAction($level)
    {
        $personage = $this->getPersonage();

        $skills = $this->getDoctrine()->getRepository('GdrUserBundle:Skill')
            ->findSkillsWithLearned($personage->getId(), $level, $personage->getRace()->getId());

        $randomSkill = $this->getDoctrine()
            ->getRepository('GdrUserBundle:SkillLearned')
            ->getRandomSkillForPlayerAndLevel($personage, $level);

        // Ho già imparato una skill per questo livello?
        $canLearn = $this->get('gdr.player.skiller')->canLearn($personage, $level);
        $canLearnRandom = $this->get('gdr.player.skill.random')->canLearn($personage, $level);

        return $this->render(
            'GdrAvatarBundle:Skill:skills.html.twig',
            array(
                'skills' => $skills,
                'canLearn' => $canLearn,
                'canLearnRandom' => $canLearnRandom,
                'uploadPath' => $this->container->getParameter('skill_upload_path') . '/',
                'level' => $level,
                'randomSkill' => $randomSkill,
                'priceForRandom' => $this->get('gdr.player.skill.random')->getPriceByLevel($level)
            )
        );
    }

    public function learnSkillAction($id)
    {
        $personage = $this->getPersonage();

        // La skill esiste per la mia razza?
        $skill = $this->getDoctrine()->getRepository('GdrUserBundle:Skill')
            ->findOneBy(
                array('id' => $id, 'race' => $this->getPersonage()->getRace())
            );

        if (null === $skill) {
            throw new AccessDeniedHttpException();
        }

        // Ho già imparato una skill di questo livello?
        $canLearn = $this->get('gdr.player.skiller')->canLearn($personage, $skill->getLevel());

        if (false === $canLearn) {
            throw new AccessDeniedHttpException();
        }

        $this->get('gdr.player.skiller')->learn($personage, $skill);

        return new JsonResponse(array('response' => true));
    }

    public function learnRandomSkillAction(Request $request)
    {
        $level = $request->get('level');

        if ($level == null) {
            throw new AccessDeniedHttpException();
        }

        $player = $this->getPersonage();
        $skillRandomService = $this->get('gdr.player.skill.random');

        $canLearn = $skillRandomService->canLearn($player, $level);

        if (!$canLearn) {
            throw new AccessDeniedHttpException("{$player->getName()} non può imparare skill di livello {$level}");
        }

        $price = $skillRandomService->getPriceByLevel($level);
        $buy = $this->get('gdr.trading')->buy($player, $price, true, "Avete acquistato una Pozione Skill");

        if ($buy === true) {

            $skillRandomService->assign($player, $level);

            $response = [
                'success' => true,
                'message' => 'Hai imparato una nuova skill.'
            ];
        } else {
            $response = [
                'success' => false,
                'message' => "Non hai i {$price} Mori richiesti per comprare la pozione nel tuo conto bancario."
            ];
        }

        return new JsonResponse($response);
    }
}