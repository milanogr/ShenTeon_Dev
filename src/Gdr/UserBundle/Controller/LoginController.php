<?php

namespace Gdr\UserBundle\Controller;

use Doctrine\ORM\EntityNotFoundException;
use Gdr\AvatarBundle\Entity\Experience;
use Gdr\GameBundle\Entity\LoginArchive;
use Gdr\GameBundle\Entity\StrilloneReaded;
use Gdr\RaceBundle\Entity\Race;
use Gdr\UserBundle\Entity\Language;
use Gdr\UserBundle\Entity\Online;
use Gdr\UserBundle\Entity\Personage;
use Gdr\UserBundle\Entity\ResetArchive;
use Gdr\UserBundle\Entity\User;
use Gdr\UserBundle\Form\Type\ChoosePgType;
use Gdr\UserBundle\Form\Type\DeadPgNewRelativeType;
use Gdr\UserBundle\Form\Type\DeadPgNewType;
use Gdr\UserBundle\Form\Type\NewPgStep1Type;
use Gdr\UserBundle\Form\Type\NewPgStep2Type;
use Gdr\UserBundle\Form\Type\ResetType;
use Sluggable\Fixture\Handler\People\Person;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;
use Gdr\UserBundle\Controller\Controller as BaseController;

class LoginController extends BaseController
{
    const LIMIT_PG = 4;

    public function loginAction($isIncluded = false)
    {
        $request = $this->getRequest();
        $session = $request->getSession();

        // get the login error if there is one
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(
                SecurityContext::AUTHENTICATION_ERROR
            );
        } else {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        }

        $view = $isIncluded ? 'GdrUserBundle:Login:login_form.html.twig' : 'GdrUserBundle:Login:login.html.twig';

        return $this->render(
            $view,
            array(
                // last username entered by the user
                'last_username' => $session->get(SecurityContext::LAST_USERNAME),
                'error' => $error,
                'csrf_token' => $this->container->get('form.csrf_provider')->generateCsrfToken('authenticate')
            )
        );
    }

    public function resetAction(Request $request)
    {
        $form = $this->createFormBuilder()
            ->add(
                'email',
                'email',
                array(
                    'constraints' => array(
                        new NotBlank(),
                        new Email()
                    )
                )
            )
            ->getForm();

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);

            if ($form->isValid()) {

                $user = $this->getDoctrine()->getRepository('GdrUserBundle:User')
                    ->findOneByEmail($form->get("email")->getData());

                // L'email inserita esiste, quindi invio la richiesta
                if (null !== $user) {

                    $user->setConfirmationToken(md5(uniqid(mt_rand(), true)));
                    $user->setPasswordRequestedAt(new \DateTime());

                    $em = $this->getDoctrine()->getManager();
                    $em->persist($user);
                    $em->flush();

                    $messaggio = \Swift_Message::newInstance()
                        ->addPart(
                            $this->renderView(
                                'GdrUserBundle:Login:emailConfirmation.txt.twig',
                                array(
                                    'token' => $user->getConfirmationToken(),
                                    'email' => $user->getEmail()
                                )
                            ),
                            'text/plain'
                        )
                        ->setSubject('Reset password')
                        ->setFrom("recupero-password@shenteon.com")
                        ->setTo($user->getEmail())
                        ->setBody(
                            $this->renderView(
                                'GdrUserBundle:Login:emailConfirmation.html.twig',
                                array(
                                    'token' => $user->getConfirmationToken(),
                                    'email' => $user->getEmail()
                                )
                            ),
                            'text/html'
                        );
                    $this->get('mailer')->send($messaggio);
                } else {
                    // Giusto per avere dei log, inserisco quelli che mettono email errate
                    $log = new ResetArchive();
                    $log->setIp($this->getRequest()->getClientIp());

                    $em = $this->getDoctrine()->getManager();
                    $em->persist($log);
                    $em->flush();
                }

                $request->getSession()
                    ->getFlashBag()
                    ->add(
                        'success',
                        'Se l\'email è corretta, ti è stata inviata una conferma e dovresti riceverla entro qualche minuto.'
                    );

                return $this->redirect($this->generateUrl('user_reset'));
            }
        }

        return $this->render('GdrUserBundle:Login:reset.html.twig', array('form' => $form->createView()));
    }

    public function doResetAction($token, $email)
    {
        $request = $this->getRequest();

        $form = $this->createForm(
            new ResetType(),
            array(
                'token_reset' => $token,
                'email_reset' => $email
            )
        );

        $form->handleRequest($request);

        if ($form->isValid()) {
            $data = $form->getData();

            $user = $this->getDoctrine()->getRepository('GdrUserBundle:User')
                ->getUserByResetToken($data['token_reset'], $data['email_reset']);

            if (null === $user) {
                $request->getSession()
                    ->getFlashBag()
                    ->add('error', 'Il tuo token/email non è valido. Effettua la procedura dall\'inizio, grazie.');

                $url = $this->generateUrl('user_do_reset', array("token" => $token, "email" => $email));

                return $this->redirect($url);
                //throw new EntityNotFoundException('Token non valido.');
            }

            $encoderPassword = $this->container->get('user.encoder.password');

            $user->setPassword(
                $encoderPassword->encodePassword($user, $data['plainPassword'])
            );
            $user->setConfirmationToken(null);
            $user->setPasswordRequestedAt(null);

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $request->getSession()
                ->getFlashBag()
                ->add('success', 'La tua password modificata con successo!');

            $url = $this->generateUrl('user_do_reset', array("token" => $token, "email" => $email));

            return $this->redirect($url);
        }

        return $this->render(
            'GdrUserBundle:Login:doReset.html.twig',
            array(
                'form' => $form->createView(),
                'token' => $token,
                'email' => $email
            )
        );
    }

    public function loginCheck()
    {
    }

    public function newPersonageAction(Request $request, $step = 1)
    {
        if (false === $this->canCreatePg()) {
            throw new AccessDeniedHttpException();
        }

        $em = $this->getDoctrine()->getManager();

        $data = $request->getSession()->get("step1-data", array());

        if ($step == 1) {

            $form = $this->createForm(new NewPgStep1Type());

            if ($request->isMethod('POST')) {
                $form->handleRequest($request);
                if ($form->isValid()) {
                    $data = $form->getData();

                    $request->getSession()->set(
                        "step1-data",
                        array(
                            "name" => null,
                            "race" => $data['race']->getId(),
                            "is_done" => true
                        )
                    );

                    return $this->redirect($this->generateUrl("user_new_pg_step"));
                }
            } else {

                $data_race = isset($data["race"]) ? $data["race"] : null;

                if (!is_null($data_race)) {
                    $race = $this->getDoctrine()->getRepository("GdrRaceBundle:Race")->findOneBy(
                        array(
                            "id" => $data["race"]
                        )
                    );
                } else {
                    $race = null;
                }
                $form->setData(
                    array(
                        "race" => $race
                    )
                );
            }

            return $this->render(
                'GdrUserBundle:Login:newPersonage.html.twig',
                array('form' => $form->createView())
            );

        } elseif ($step == 2) {
            if (!$data['is_done']) {
                $url = $this->generateUrl('user_new_pg');
                $this->redirect($url);
            }

            $race = $this->getDoctrine()->getRepository("GdrRaceBundle:Race")->findOneBy(
                array(
                    "id" => $data["race"],
                    'isActive' => true
                )
            );

            if (null === $race) {
                $url = $this->generateUrl('user_new_pg');
                $this->redirect($url);
            }

            $pg = new Personage();
            $pg->setRace($race);
            $pg->setUser($this->getUser());
            $pg->setCombatPoints(1);

            $form = $this->createForm(new NewPgStep2Type($race), $pg);

            $form->handleRequest($request);

            if ($form->isValid()) {

                $pg->setUser($this->getUser());
                /**
                 * @var \Gdr\RaceBundle\Service\Service
                 */
                $service = $this->get("gdr.race.service");
                $pg = $service->rebornPersonage($pg, $pg->getAge(), false, true);
                $pg->setName(ucfirst(strtolower($pg->getName())));

                // Aggiungo l'esperienza
                $exp = new Experience();
                $exp->setPersonage($pg);
                $exp->setBody(strtoupper($pg->getName()) . " viene registrato all’Anagrafe di Teon.");

                // Aggiungo la lingua di base se esiste.
                if ($race->getUseRaceLanguage()) {
                    $language = new Language();
                    $language->setPersonage($pg);
                    $language->setRace($pg->getRace());
                    $em->persist($language);
                }

                $em->persist($pg);
                $em->persist($exp);
                $em->flush();

                // Ho creato il pg come referral?
                $this->get('gdr.referrer')->hasToAssign($this->getUser(), $pg);

                $service->generateBaseInventory($pg);

                $textMissiva = $this->renderView('@GdrUser/Login/missivaBenvenuto.html.twig');
                $general = $this->get('gdr.game_bundle.general');
                $general->createSystemLetter($textMissiva, $pg->getId(), "Gestione");

                return $this->redirect($this->generateUrl("user_choose_pg"));
            }


            $rl_rep = $this->getDoctrine()->getRepository("GdrRaceBundle:RaceLevel");
            $race_level = $rl_rep->findByAgeAndRaceId($race->getAgeMin(), $race);

            return $this->render(
                'GdrUserBundle:Login:newPersonageStep2.html.twig',
                array(
                    'form' => $form->createView(),
                    'raceLevel' => $race_level,
                    'race' => $race
                )
            );
        }
    }

    public function chooseDeadPersonageAction($id, $action = null)
    {
        $user = $this->getUser();

        $personage = $this->getDoctrine()
            ->getRepository('GdrUserBundle:Personage')
            ->findOneBy(
                array(
                    "id" => $id,
                    "isDead" => true,
                    "user" => $user
                )
            );

        if (is_null($personage)) {
            throw new EntityNotFoundException('Personaggio morto non ti appartiene');
        } elseif ($personage->getIsSoul()) {
            throw new EntityNotFoundException("Sei ancora un'anima");
        }

        if (!is_null($action)) {
            /**
             * @var \Gdr\RaceBundle\Service\Service
             */
            $service = $this->get("gdr.race.service");
            $request = $this->getRequest();
            $em = $this->getDoctrine()->getManager();
            $url = $this->generateUrl('user_choose_pg');

            $rl_rep = $this->getDoctrine()->getRepository("GdrRaceBundle:RaceLevel");
            $race_level = $rl_rep->findByAgeAndRaceId(
                $personage->getRace()->getAgeMin(),
                $personage->getRace()->getId()
            );
            $oldName = $personage->getName() . " " . $personage->getSurname();
            $oldPersonage = clone $personage;

            switch ($action) {
                case "rinascita":
                    if ($personage->getIsSpecialDeath()) {
                        $service->rebornPersonage($personage, $personage->getAge());
                    } else {
                        $service->rebornPersonage($personage, $personage->getAge() - 10);
                    }

                    $service->addExperience(
                        $personage,
                        strtoupper($personage->getName()) . " da oggi torna a camminare tra i vivi."
                    );

                    return $this->redirect($url);

                    break;
                // Parente
                case "parente":

                    $form = $this->createForm(new DeadPgNewRelativeType($personage->getRace(), false), $personage);

                    if ($form->handleRequest($request)) {
                        if ($form->isValid()) {

                            $service->buildLapide($oldPersonage, $form->get('epitaffio')->getData());
                            $service->clearChiavi($personage);

                            $personage = $service->rebornPersonage($personage, $personage->getAge(), false);
                            $personage->setCombatLevel(0);
                            $personage->setTitle(null);
                            $personage->setMarriedWith(null);
                            $personage->setStatus(null);

                            $em->persist($personage);
                            $em->flush();

                            $service->addExperience(
                                $personage,
                                $oldName . " è stato sepolto e la sua eredità passa nelle mani di “{$personage}”"
                            );

                            return $this->redirect($url);
                        }
                    }

                    return $this->render(
                        'GdrUserBundle:Login:deadNewRelative.html.twig',
                        array(
                            'form' => $form->createView(),
                            "id" => $id,
                            'raceLevel' => $race_level,
                            'race' => $personage->getRace(),
                            'changeSurname' => false
                        )
                    );

                    break;

                case "nuovo-pg":

                    $form = $this->createForm(new DeadPgNewRelativeType($personage->getRace()), $personage);

                    if ($form->handleRequest($request)) {
                        if ($form->isValid()) {

                            $service->clearPersonage($personage);
                            $service->generateBaseInventory($personage);
                            $service->buildLapide($oldPersonage, $form->get('epitaffio')->getData());

                            $personage = $service->rebornPersonage($personage, $personage->getAge(), false);

                            $service->addExperience(
                                $personage,
                                $oldName . " è stato sepolto e non lascia alcuna eredità."
                            );

                            $em->persist($personage);
                            $em->flush();

                            return $this->redirect($url);
                        }
                    }

                    return $this->render(
                        'GdrUserBundle:Login:deadNewPersonage.html.twig',
                        array(
                            'form' => $form->createView(),
                            "id" => $id,
                            'raceLevel' => $race_level,
                            'race' => $personage->getRace(),
                            'changeSurname' => true
                        )
                    );
                    break;

                default:
                    throw new Exception("Azione non consentita");
                    break;
            }
        }

        return $this->render(
            'GdrUserBundle:Login:chooseDeadPersonage.html.twig',
            array('personage' => $personage)
        );


    }

    /**
     * Esegue il login del personaggio scelto.
     *
     * @param null $id
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \Doctrine\ORM\EntityNotFoundException
     * @throws \Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException
     */
    public function choosePersonageAction($id = null)
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();

        $banned = $this->getDoctrine()->getRepository('GdrUserBundle:Esilio')
            ->getActiveEsilio($this->getUser()->getId());

        if ($banned) {
            return $this->render("GdrUserBundle:Login:esiliato.html.twig", array("ban" => $banned));
        }

        if (!is_null($id)) {
            // Scelta fatta
            $personage = $this->getDoctrine()
                ->getRepository("GdrUserBundle:Personage")
                ->findOneBy(
                    array(
                        "user" => $user,
                        "id" => $id
                    )
                );
            if (is_null($personage)) {
                throw new EntityNotFoundException('Personaggio non esistente');
            }

            if ($personage->getIsDead() && !$personage->getIsSoul()) {
                throw new EntityNotFoundException('Personaggio morto non si logga');
            }

            if ($this->get('gdr.permission')->isBanned($this->getUser())) {
                throw new AccessDeniedHttpException("Account esiliato.");
            }

            // Setto l'id del personaggio scelto.
            $this->getRequest()->getSession()->set('personage', $personage->getId());

            $defaultLocation = $this->getDoctrine()
                ->getRepository('GdrGameBundle:Location')
                ->findOneBy(array('name' => 'Teon'));

            if (null === $defaultLocation) {
                throw new EntityNotFoundException('Loc default non esistente.');
            }

            // Controllo se il record online del mio pg esiste.
            // Se si, lo aggiorno, se no, lo creo.
            $online = $em->getRepository('GdrUserBundle:Online')
                ->findOneBy(
                    array(
                        'personage' => $personage
                    )
                );

            if (null === $online) {
                $online = new Online();
                $online->setLocation($defaultLocation);
                $online->setPersonage($personage);
                $personage->setOnline($online);
            }

            // Se rientrando sono ancora in gioco (uscito dalla X), controllo che la locazione esista ancora.
            // Se esise, lascio com'è, altrimenti imposto quella di default e tolgo "in gioco".
            if (true === $online->getIsInGame() && null === $online->getLocation()) {
                $online->setLocation($defaultLocation);
                $online->setIsInGame(false);
                $online->setInGameEntered(null);
            }

            // Controllo se sono invisibile; nel caso non potrei, mi rimetto visibile.
            if ($online->getIsInvisible() && false === $this->getPermission()->canBeInvisible()) {
                $online->setIsInvisible(false);
            }

            // Se sono in gioco, dopo 20 minuti di inattività vado alla location di default.
            if (true === $online->getIsInGame()) {

                if (new \DateTime() >= $online->getLastActivity()->modify("+20 minutes")) {
                    $online->setLocation($defaultLocation);
                    $online->setIsInGame(false);
                    $online->setInGameEntered(null);
                    $online->setInventoryBlockedUntil(null);
                }
            }

            // Torno sempre alla default.
            if (false === $online->getIsInGame()) {
                $online->setLocation($defaultLocation);
            }

            $online->setCreated(new \DateTime());
            $online->setLastActivity(new \DateTime());
            $online->setIsActive(true);

            // Inserisco l'ultimo login.
            $personage->setLastLogin(new \DateTime());

            // Se sono passate le 5 di mattina, il grimorio studiato deve essere tolto.
            $now = new \DateTime();
            $now = $now->format('U');

            $studyGrimory = $personage->getCanStudyGrimoryAt()
                ? $personage->getCanStudyGrimoryAt()->format('U')
                : null;

            // Resetto lo studio!
            // TODO: Muovi in CRON.
            if (null === $studyGrimory || $now >= $studyGrimory) {
                $repo = $this->getDoctrine()->getRepository('GdrUserBundle:Grimory');
                $learnedSpells = $repo->findSpellsLearned($personage->getId(), true);

                foreach ($learnedSpells as $spell) {

                    // Controllo se ho il livello adatto.

                    $spell->setIsLearned(false);
                    $spell->setIsUsed(false);
                    $em->persist($spell);
                }
                $personage->setCanStudyGrimoryAt(null);
            }

            // Loggo l'evento del login in archivio.
            $loginArchive = new LoginArchive();
            $loginArchive->setPersonage($personage);
            $loginArchive->setUser($user);
            $loginArchive->setIp($this->getRequest()->getClientIp());

            // Salvo l'oggetto mutaforma.
            $lupo = $this->getDoctrine()->getRepository('GdrItemsBundle:Item')
                ->findOneBy(array("name" => "Mutaforma Lupo"));
            if (null !== $lupo) {
                $icon = $lupo->getDressIconImageName();
            } else {
                $icon = null;
            }

            $this->getRequest()->getSession()->set('personage-login', time());
            $this->getRequest()->getSession()->set('wolf-dress-name', "Mutaforma Lupo");
            $this->getRequest()->getSession()->set('wolf-dress-icon', $icon);

            // Devo pagare il referrer?
            $this->get('gdr.referrer')->hasToPay($personage);

            $em = $this->getDoctrine()->getManager();
            $em->persist($online);
            $em->persist($personage);
            $em->persist($loginArchive);
            $em->flush();

            $url = $this->generateUrl('game_homepage');

            return $this->redirect($url);

        } else {
            $personages = $this->getDoctrine()
                ->getRepository('GdrUserBundle:Personage')
                ->findBy(
                    array(
                        "user" => $user
                    )
                );

            return $this->render(
                'GdrUserBundle:Login:choosePersonage.html.twig',
                array('personages' => $personages, 'canCreate' => $this->canCreatePg())
            );
        }
    }

    public function showRaceAction($id)
    {
        $race = $this->getDoctrine()->getRepository('GdrRaceBundle:Race')
            ->findOneBy(
                array(
                    'id' => $id,
                    'isActive' => true
                )
            );

        if (null === $race) {
            $this->createNotFoundException("La razza non è stata trovata");
        }

        return $this->render(
            'GdrSiteBundle:Race:showRace.html.twig',
            array('race' => $race)
        );
    }

    public function showAttrAgeAction($age, $race)
    {
        $race = $this->getDoctrine()->getRepository('GdrRaceBundle:Race')
            ->findOneBy(array('id' => $race, 'isActive' => true));

        if (null === $race) {
            throw new EntityNotFoundException();
        }

        $rl_rep = $this->getDoctrine()->getRepository("GdrRaceBundle:RaceLevel");
        $race_level = $rl_rep->findByAgeAndRaceId($age, $race);

        if (null === $race_level) {
            return new JsonResponse(array(
                'forza' => "Errore",
                'saggezza' => "Errore",
                'fascia' => "Errore"
            ));
        }

        return new JsonResponse(array(
            'forza' => $race_level->getStrength(),
            'saggezza' => $race_level->getWisdom(),
            'fascia' => $race_level->getName()
        ));
    }

    /**
     * @param $id Personage Id
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showNotReadedLettersAction($id){

        $count = $this->getDoctrine()->getRepository('GdrGameBundle:Letter')
            ->countNotReadedLetters($id);

        return new Response( (int) $count);
    }

    protected function canCreatePg()
    {
        $totalPg = count(
            $this->getDoctrine()->getRepository('GdrUserBundle:Personage')
                ->findBy(
                    array(
                        'user' => $this->getUser()
                    )
                )
        );

        $esiliato = $this->get('gdr.permission')->isBanned($this->getUser());

        if ($totalPg >= self::LIMIT_PG || $esiliato) {
            return false;
        } else {
            return true;
        }
    }
}