<?php

namespace Gdr\AvatarBundle\Controller;

use Doctrine\ORM\EntityNotFoundException;
use Gdr\UserBundle\Controller\Controller;
use Gdr\UserBundle\Entity\Skill;
use Gdr\UserBundle\Entity\SkillLearned;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class AchievementController extends Controller
{
    public function indexAction($name = null)
    {
        $personage = $this->checkIfValidName($name);
        $achievements = $this->getDoctrine()->getRepository('GdrUserBundle:Achievement')
            ->findBy(array(
                'personage' => $personage
            ));

        return $this->render(
            'GdrAvatarBundle:Achievement:index.html.twig',
            array(
                'achievements' => $achievements,
                'isOwner' => $personage == $this->getPersonage()
            )
        );
    }

    /**
     * @param $name
     *
     * @return \Gdr\UserBundle\Entity\Personage
     * @throws \Doctrine\ORM\EntityNotFoundException
     */
    protected function checkIfValidName($name = null)
    {
        if (null === $name) {
            return $this->getPersonage();
        }

        $personage = $this->getDoctrine()
            ->getRepository('GdrUserBundle:Personage')
            ->findOneBy(array('name' => $name));

        if (null === $personage) {
            throw new EntityNotFoundException();
        }

        return $personage;
    }
}