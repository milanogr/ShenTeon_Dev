<?php

namespace Gdr\AvatarBundle\Controller;

use Doctrine\ORM\EntityNotFoundException;
use Gdr\AvatarBundle\Entity\Diary;
use Gdr\AvatarBundle\Form\Type\DiaryType;
use Gdr\UserBundle\Controller\Controller;
use Gdr\UserBundle\Entity\Personage;
use Symfony\Component\HttpFoundation\File\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DiaryController extends Controller
{
    CONST MAX_PER_PAGE = 16;

    public function indexAction($name = null)
    {
        if (null === $name) {
            $personage = $this->getPersonage();
            $is_owner = true;
        } else {
            $personage = $this->checkIfValidName($name);
            $is_owner = $personage == $this->getPersonage() ? true : false;
        }

        // Recupero i titoli dei diari creati.
        $diaries = $this->getDoctrine()
            ->getRepository('GdrAvatarBundle:Diary')
            ->getQueryDiariesByPersonage($personage->getId(), $is_owner);

        $paginator = $this->get('knp_paginator')->paginate(
            $diaries,
            $this->getRequest()->query->get('page', 1),
            DiaryController::MAX_PER_PAGE,
            array('distinct' => false)
        );

        $template = $this->getRequest()->query->get('ajax', 0)
            ? 'GdrAvatarBundle:Diary:list.html.twig'
            : 'GdrAvatarBundle:Diary:index.html.twig';

        // Voglio dividere in due colonne i risultati.
        $splitValue = $paginator->getTotalItemCount() > DiaryController::MAX_PER_PAGE
            ? DiaryController::MAX_PER_PAGE
            : $paginator->getTotalItemCount();

        $split = floor($splitValue / 2);

        return $this->render(
            $template,
            array(
                'paginator' => $paginator,
                'split' => $split,
                'is_owner' => $is_owner,
                'name' => $name
            )
        );
    }

    public function showAction($id)
    {
        $diary = $this->getDoctrine()
            ->getRepository('GdrAvatarBundle:Diary')
            ->findOneBy(array('id' => $id));

        if (null === $diary) {
            throw new EntityNotFoundException();
        }

        return $this->render(
            'GdrAvatarBundle:Diary:show.html.twig',
            array(
                'diary' => $diary
            )
        );
    }

    public function createAction(Request $request)
    {
        $diary = new Diary();
        $diary->setPersonage($this->getPersonage());

        $form = $this->createForm(new DiaryType($this->getPermission()), $diary);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $diary->setBody($this->get('gdr.forum')->purifyBody($diary->getBody()));
                $em->persist($diary);
                $em->flush();

                return new JsonResponse(array(
                    'response' => true,
                    'message' => '<p>La pagina del diario è stata creata con successo.</p>'
                ));
            } else {
                return new JsonResponse(array(
                    'response' => false,
                    'message' => '<p>Attenzione: assicurati di aver compilato il titolo ed il testo.</p>'
                ));
            }
        }

        return $this->render(
            'GdrAvatarBundle:Diary:form.html.twig',
            array(
                'form' => $form->createView(),
                'url' => $this->generateUrl('avatar-diary-create'),
                'title' => 'Scrivi una nuova pagina del tuo diario'
            )
        );
    }

    public function deleteAction($id)
    {
        $this->isOwner($this->getPersonage());

        $diary = $this->getDoctrine()
            ->getRepository('GdrAvatarBundle:Diary')
            ->findOneBy(array('id' => $id));

        if (null === $diary) {
            throw new EntityNotFoundException();
        }

        $em = $this->getDoctrine()->getManager();
        $em->remove($diary);
        $em->flush();

        return new JsonResponse(array('response' => true));
    }

    public function editAction($id)
    {
        $request = $this->getRequest();

        $diary = $this->getDoctrine()
            ->getRepository('GdrAvatarBundle:Diary')
            ->findOneBy(array('id' => $id, 'personage' => $this->getPersonage()));

        if (null === $diary) {
            throw new EntityNotFoundException();
        }

        $form = $this->createForm(new DiaryType($this->getPermission()), $diary);

        // Cancello via POST.
        if ($request->isMethod('POST')) {

            $form->handleRequest($this->getRequest());

            if ($form->isValid()) {
                $diary->setBody($this->get('gdr.forum')->purifyBody($diary->getBody()));
                $em = $this->getDoctrine()->getManager();
                $em->persist($diary);
                $em->flush();

                return new JsonResponse(array(
                    'response' => true,
                    'message' => '<p>La pagina è stata modificata con successo.</p>'
                ));
            } else {
                return new JsonResponse(array(
                    'response' => false,
                    'message' => '<p>Attenzione: assicurati di aver compilato il titolo ed il testo.</p>'
                ));
            }
        }

        return $this->render(
            'GdrAvatarBundle:Diary:form.html.twig',
            array(
                'form' => $form->createView(),
                'url' => $this->generateUrl('avatar-diary-edit', array('id' => $id)),
                'title' => "Modifica {$diary->getTitle()}"
            )
        );

    }

    /**
     * @param $name
     *
     * @return \Gdr\UserBundle\Entity\Personage
     * @throws EntityNotFoundException
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
     * @throws \Symfony\Component\HttpFoundation\File\Exception\AccessDeniedException
     */
    protected function isOwner(Personage $personage)
    {
        if ($personage == $this->getPersonage()) {
            return $personage;
        } else {
            throw new AccessDeniedException('No owner');
        }
    }
}