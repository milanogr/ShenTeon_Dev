<?php

namespace Gdr\AvatarBundle\Controller;

use Gdr\AvatarBundle\Form\Type\ManagementCommonType;
use Gdr\UserBundle\Controller\Controller;
use Gdr\UserBundle\Form\Type\UserType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class ManagementController extends Controller
{
    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        $personage = $this->getPersonage();
        $permissions = $this->get('gdr.permission');
        $canMarry = $permissions->canMarry();

        $pgRef = $this->getDoctrine()->getRepository('GdrUserBundle:Referrer')
            ->findBy(array("referrerPersonage" => $personage));

        return $this->render(
            'GdrAvatarBundle:Management:index.html.twig',
            array(
                'personage' => $personage,
                'isMod' => $permissions->isMod(),
                "canMarry" => $canMarry,
                'isFate' => $permissions->isFate(),
                'pgRef' => $pgRef
            )
        );
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function formCommonAction(Request $request)
    {
        $personage = $this->getPersonage();
        $form = $this->createForm(new ManagementCommonType($personage->getRace()), $personage);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($personage);
                $em->flush();

                $return = array(
                    'response' => true,
                    'message' => 'I dati sono stati aggiornati con successo'
                );
            } else {
                $return = array(
                    'response' => false,
                    'message' => $this->getErrorMessages($form)
                );
            }

            return new JsonResponse($return);
        }

        return $this->render(
            'GdrAvatarBundle:Management:form-common.html.twig',
            array(
                'form' => $form->createView(),
                'personage' => $personage
            )
        );
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function formUserAction(Request $request)
    {
        $user = $this->getUser();
        $form = $this->createForm(new UserType(), $user);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);

            if ($form->isValid()) {

                if ($user->getPlainPassword()) {
                    $encoderPassword = $this->container->get('user.encoder.password');

                    $user->setPassword(
                        $encoderPassword->encodePassword($user, $user->getPlainPassword())
                    );
                }

                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();

                $return = array(
                    'response' => true,
                    'message' => 'I dati sono stati aggiornati con successo'
                );
            } else {
                $return = array(
                    'response' => false,
                    'message' => $this->getErrorMessages($form)
                );
            }

            return new JsonResponse($return);
        }

        return $this->render(
            'GdrAvatarBundle:Management:form-user.html.twig',
            array(
                'form' => $form->createView()
            )
        );
    }

    /**
     * @param \Symfony\Component\Form\Form $form
     *
     * @return array
     */
    private function getErrorMessages(\Symfony\Component\Form\Form $form)
    {
        $errors = array();

        foreach ($form->getErrors() as $key => $error) {
            $errors[] = $error->getMessage();
        }

        foreach ($form->all() as $child) {
            if (!$child->isValid()) {
                $errors[$child->getName()] = $this->getErrorMessages($child);
            }
        }

        $string = array();

        foreach ($errors as $e) {
            $string[] = $e;
        }

        return $string;
    }

    public function killAction($suicide = false)
    {
        $personage = $this->getPersonage();

        if (false === $personage->getIsDead()){
            $this->get('gdr.race.service')->killPersonage($this->getPersonage(), $suicide);
        }

        $online = $this->getDoctrine()->getRepository('GdrUserBundle:Online')
            ->find($personage->getId());

        if (null !== $online){
            $em = $this->getDoctrine()->getManager();

            // Sloggo e lo tolgo da dove gioca.
            $em->remove($online);
            $em->flush();
        }

        return new JsonResponse(array(
            'response' => true
        ));
    }
}