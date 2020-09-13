<?php

namespace Gdr\UserBundle\Listener;


use Doctrine\Bundle\DoctrineBundle\Registry as Doctrine;
use Doctrine\ORM\EntityNotFoundException;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Core\Exception\AccountExpiredException;
use Symfony\Component\Security\Core\Exception\SessionUnavailableException;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Gdr\UserBundle\Entity\User;
use Gdr\UserBundle\Entity\Online;
use Symfony\Component\HttpFoundation\Session\Session;

class Activity
{
    protected $security;
    protected $em;
    protected $request;
    protected $router;
    protected $limit;
    protected $session;
    private $permission;

    public function __construct(
        SecurityContext $security,
        Doctrine $doctrine,
        Router $router,
        RequestInjector $requestInjector
    ) {
        $this->security = $security;
        $this->em = $doctrine->getManager();
        $this->request = $requestInjector->getRequest();
        $this->router = $router;
        $this->limit = $requestInjector->getParameter('user_inactivity');
        $this->session = $this->request->getSession();
    }

    /**
     * @param FilterControllerEvent $event
     *
     * @return bool
     */
    public function onCoreController(FilterControllerEvent $event)
    {
        // Se non sono loggato o non ho ancora scelto il pg devo skippare il metodo, altrimenti genererebbe errori a manetta.
        if (!$this->session->get('personage') || false === $this->security->isGranted('ROLE_USER')) {
            return true;
        }

        if (!$this->session->has('activity_last_time')) {
            $this->session->set('activity_last_time', new \DateTime());
        }

        $last_activity_time = $this->session->get('activity_last_time');

        // Per evitare che il controllo venga eseguito ad ogni richiesta, vi è il tempo minimo di qualche minuto
        if ($last_activity_time < new \DateTime("-5 seconds")) {
            $this->session->set('activity_last_time', new \DateTime());

            // Imposto ad "offline" i pg in idle; se aggiorneranno la pagina si vedranno invalidare la sessione.
            $this->removeOfflineUsers();

            $personage_id = $this->session->get('personage');
            $onlinePersonage = $this->em->getRepository('GdrUserBundle:Online')
                ->findOneBy(array('personage' => $personage_id, 'isActive' => true));

            $pg = $this->em->getRepository('GdrUserBundle:Personage')
                ->find($this->session->get('personage'));

            // Sono esiliato?
            if (null === $pg){
                $esiliato = null;
            }else{
                $esiliato = $this->em->getRepository('GdrUserBundle:Esilio')
                    ->getActiveEsilio($pg->getUser()->getId());
            }

            $esiliato = null === $esiliato ? false : true;

            if (null === $pg || null === $onlinePersonage || true === $esiliato) {
                $this->forceLogout();
            }

            $onlinePersonage->setLastActivity(new \DateTime());
            $this->em->persist($onlinePersonage);
            $this->em->flush();
        }

        return true;
    }

    /**
     * Elimina dalla tabella "Online" gli utenti inattivi.
     */
    public function removeOfflineUsers()
    {
        $offlines = $this->em->getRepository('GdrUserBundle:Online')
            ->getUsersOffline(new \DateTime("-5 minutes"));

        foreach ($offlines as $offline) {
            $offline->setIsActive(false);
            $this->em->persist($offline);
        }

        $this->em->flush();
    }

    public function forceLogout()
    {
        $this->request->getSession()->invalidate();
        $this->security->setToken(null);

        throw new SessionUnavailableException('Sessione scaduta');
    }
}