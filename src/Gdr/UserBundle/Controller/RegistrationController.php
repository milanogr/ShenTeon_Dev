<?php

namespace Gdr\UserBundle\Controller;

use Gdr\UserBundle\Entity\Referrer;
use Gdr\UserBundle\Form\Model\Registration;
use Symfony\Component\HttpFoundation\Request;
use Gdr\UserBundle\Entity\User;
use Gdr\UserBundle\Form\Type\RegisterType;

class RegistrationController extends Controller
{
    public function registerAction(Request $request)
    {
        $form = $this->createForm(new RegisterType());

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);

            if ($form->isValid()) {
                /** @var \Gdr\UserBundle\Entity\User $user */
                $user = $form->get('user')->getData();

                $encoderPassword = $this->container->get('user.encoder.password');

                $user->setPassword(
                    $encoderPassword->encodePassword($user, $user->getPlainPassword())
                );

                $em = $this->getDoctrine()->getManager();

                if ($form->get('referrer')->getData()){
                    /** @var \Gdr\UserBundle\Entity\User $user */
                    $referrer = $form->get('referrer')->getData();

                    $newRef = new Referrer();
                    $newRef->setNewUser($user);
                    $newRef->setReferrerPersonage($referrer);
                    $em->persist($newRef);
                }

                $em->persist($user);
                $em->flush();

                $email = \Swift_Message::newInstance()
                    ->addPart($this->renderView('@GdrUser/Registration/email.txt.twig'), 'text/plain')
                    ->setSubject('Conferma della registrazione')
                    ->setFrom('registrazione@shenteon.com')
                    ->setTo($user->getEmail())
                    ->setBody(
                        $this->renderView('@GdrUser/Registration/email.html.twig'),
                        'text/html'
                    );

                $this->get('mailer')->send($email);

                $url = $this->generateUrl('user_post_register');
                return $this->redirect($url);
            }
        }

        return $this->render('GdrUserBundle:Registration:register.html.twig', array('form' => $form->createView()));
    }

    public function postRegisterAction()
    {
        return $this->render(
            '@GdrUser/Registration/registrationOk.html.twig'
        );
    }
}