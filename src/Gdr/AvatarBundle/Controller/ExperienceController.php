<?php

namespace Gdr\AvatarBundle\Controller;

use Doctrine\ORM\EntityNotFoundException;
use Gdr\UserBundle\Controller\Controller;
use Gdr\UserBundle\Entity\Personage;
use Symfony\Component\HttpFoundation\File\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\JsonResponse;

class ExperienceController extends Controller
{
    const MAX_PER_PAGE = 15;

    public function indexAction($name)
    {
        // Il nome esiste?
        $personage = $this->checkIfValidName($name);

        // Sono l'owner?
        $is_owner = $personage === $this->getPersonage();

        // Posso vedere gli oggetti invisibili solo se sono il proprietario o admin.
        $can_view_invisibles = $is_owner || $this->get('security.context')->isGranted('ROLE_ADMIN')
            ? true : false;

        $experiences = $this->getDoctrine()
            ->getRepository('GdrAvatarBundle:Experience')
            ->getQueryExperiencesByPersonage($personage->getId(), $can_view_invisibles)
        ;

        $paginator = $this->get('knp_paginator')->paginate(
            $experiences,
            $this->getRequest()->query->get('page', 1),
            ExperienceController::MAX_PER_PAGE,
            array('distinct' => false)
        );

        return $this->render('GdrAvatarBundle:Experience:index.html.twig', array(
                'paginator' => $paginator,
                'is_owner' => $is_owner
            ));
    }

    /**
     * @param $id
     *
     * @return JsonResponse
     * @throws \Doctrine\ORM\EntityNotFoundException
     */
    public function changeVisibilityAction($id)
    {
        $experience = $this->getDoctrine()
            ->getRepository('GdrAvatarBundle:Experience')
            ->findOneBy(array('id' => $id, 'personage' => $this->getPersonage()));

        if (null === $experience) {
            throw new EntityNotFoundException();
        }

        $new_value = $experience->getIsInvisible() ? false : true;

        $experience->setIsInvisible($new_value);
        $em = $this->getDoctrine()->getManager();
        $em->persist($experience);
        $em->flush();

        return new JsonResponse(array('value' => $new_value));
    }

    /**
     * @param $name
     *
     * @return \Gdr\UserBundle\Entity\Personage
     * @throws \Doctrine\ORM\EntityNotFoundException
     */
    protected function checkIfValidName($name)
    {
        $personage = $this->getDoctrine()
            ->getRepository('GdrUserBundle:Personage')
            ->findOneBy(array('name' => $name));

        if (null === $personage) {
            throw new EntityNotFoundException();
        }

        return $personage;
    }

    /**
     * @param Personage $personage
     *
     * @return Personage
     * @throws AccessDeniedException
     */
    protected function isOwner(Personage $personage)
    {
        if ($personage == $this->getPersonage()) {
            return $personage;
        } else {
            throw new AccessDeniedException();
        }
    }
}