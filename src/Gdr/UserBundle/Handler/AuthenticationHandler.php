<?php

namespace Gdr\UserBundle\Handler;

use Doctrine\ORM\EntityNotFoundException;
use Gdr\ItemsBundle\Entity\Inventory;
use Gdr\UserBundle\Entity\Personage;
use Gdr\UserBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Exception\SessionUnavailableException;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Router;
use Symfony\Component\Security\Http\Logout\LogoutSuccessHandlerInterface;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Security\Core\SecurityContext;
use Gdr\UserBundle\Entity\Online;
use Symfony\Component\Security\Http\Authentication\AuthenticationFailureHandlerInterface;

class AuthenticationHandler implements AuthenticationSuccessHandlerInterface, LogoutSuccessHandlerInterface, AuthenticationFailureHandlerInterface
{
    private $router;
    private $security;
    private $em;
    private $session;

    /**
     * @param Router          $router
     * @param EntityManager   $em
     * @param SecurityContext $security
     * @param Session         $session
     */
    public function __construct(Router $router, EntityManager $em, SecurityContext $security, Session $session)
    {
        $this->router = $router;
        $this->em = $em;
        $this->security = $security;
        $this->session = $session;
    }

    /**
     * Quando un utente effettua il login lo rimando alla scelta del pg.
     *
     * @param Request        $request
     * @param TokenInterface $token
     *
     * @return RedirectResponse|\Symfony\Component\Security\Http\Authentication\Response
     */
    public function onAuthenticationSuccess(Request $request, TokenInterface $token)
    {
        $redirect = $this->router->generate('user_choose_pg');

        return new RedirectResponse($redirect);
    }

    /**
     * @param Request $request
     *
     * @return RedirectResponse|\Symfony\Component\Security\Http\Logout\Response
     * @throws \Symfony\Component\Security\Core\Exception\SessionUnavailableException
     */
    public function onLogoutSuccess(Request $request)
    {
        // Fix logout rotto
        if (!$this->session->get('personage')) {
            $this->session->invalidate();
            $this->security->setToken(null);

            throw new SessionUnavailableException('Sessione scaduta');
        }

        // Inserisco l'avvenuto logout
        $personage = $this->em->getRepository('GdrUserBundle:Personage')->findOneBy(
            array('id' => $this->session->get('personage'))
        );
        $personage->setLastLogout(new \DateTime());

        // Aggiungo i punti carisma.
        $logInTime = $this->session->get('personage-login');
        $logOutTime = time();
        $minuti = floor(($logOutTime - $logInTime) / 60);
        $carisma = round($minuti / 60, 2);
        $personage->setCarisma($personage->getCarisma() + $carisma);

        //var_dump($logInTime, $logOutTime, $minuti, $carisma, $personage->getCarisma() + $carisma);exit;

        $this->em->persist($personage);
        $this->em->flush();

        // Aggiorno i dati in "online".
        $this->removeIfOnline($personage);

        $redirect = $this->router->generate('site_homepage');

        if ($request->isXmlHttpRequest()) {
            throw new AccessDeniedHttpException();
        } else {
            return new RedirectResponse($redirect);
        }
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception)
    {
        $redirect = $this->router->generate('login');

        if ($request->isXmlHttpRequest()) {
            throw new AccessDeniedHttpException();
        } else {
            return new RedirectResponse($redirect);
        }
    }

    /**
     * @param Personage $personage
     *
     * @return bool
     */
    private function removeIfOnline(Personage $personage)
    {
        $online = $this->em->getRepository('GdrUserBundle:Online')
            ->findOneBy(array('personage' => $personage));

        if ($online) {
            // Ero in gioco, ma sono uscito direttamente con "esci".
            if ($online->getIsInGame()) {
                $minutes = Inventory::INVENTORY_BLOCKED_MINUTES;
                $online->setInventoryBlockedUntil(new \DateTime("+{$minutes} minutes"));
            }
            $online->setIsInGame(false);
            $online->setInGameEntered(null);
            $online->setIsActive(false);
            $this->em->persist($online);
            $this->em->flush();

            return true;
        }

        return false;
    }
}