<?php

namespace Gdr\UserBundle\Controller;

use Gdr\UserBundle\Entity\Personage;
use Symfony\Bundle\FrameworkBundle\Controller\Controller as BaseController;
use Symfony\Component\Debug\Exception\FatalErrorException;
use Symfony\Component\Security\Core\Exception\SessionUnavailableException;

class Controller extends BaseController
{
    protected $personage = null;
    protected $location = null;

    /**
     * @return \Symfony\Component\Security\Core\SecurityContext
     */
    protected function getSecurityContext()
    {
        return $this->container->get('security.context');
    }

    /**
     * @return \Gdr\UserBundle\Entity\User
     */
    public function getUser()
    {
        return parent::getUser();
    }

    /**
     * @return \Gdr\UserBundle\Entity\Personage
     */
    public function getPersonage()
    {
        $id = $this->getRequest()->getSession()->get('personage');

        if (null === $id) {
            $this->forceLogout();
        }

        if (null === $this->personage) {

            $repo = $this->getDoctrine()->getRepository('GdrUserBundle:Personage');
            $this->personage = $repo->find($id);
        }

        return $this->personage;
    }

    /**
     * @param bool $using_session
     * @param bool $object
     *
     * @return \Gdr\GameBundle\Entity\Location|mixed|null
     */
    public function getCurrentLocation($using_session = false, $object = false)
    {
        if (false === $using_session) {
            if (null === $this->location) {
                $this->location = $this->getPersonage()->getOnline()->getLocation();
            }

            return $this->location;
        } else {
            if ($object) {
                return $this->getDoctrine()->getRepository('GdrGameBundle:Location')
                    ->find($this->getRequest()->getSession()->get('current_location'));
            } else {
                return $this->getRequest()->getSession()->get('current_location');
            }
        }
    }

    public function isInGame()
    {
        $online = $this->getPersonage()->getOnline();

        if (false === $online->getIsInGame()) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * @return \Gdr\GameBundle\Permission
     */
    public function getPermission()
    {
        return $this->get('gdr.permission');
    }

    public function logoutIfBanned()
    {
        if ($this->get('gdr.permission')->isBanned($this->getUser())) {
            $this->forceLogout();
        }
    }

    public function forceLogout()
    {
        $this->getRequest()->getSession()->invalidate();
        $this->getSecurityContext()->setToken(null);

        throw new SessionUnavailableException('Sessione scaduta');
    }

    /**
     * @param Personage $personage
     *
     * @return array ['rankPath']['rankName']
     */
    public function getRightRank(Personage $personage)
    {
        $rank = array();
        $usedRankEnclave = false;
        $usedRankClan = false;

        // Ho un Enclave? Se sì, recupero il livello, ma solo se non sono Ignoto.
        $rankEnclave = $personage->getEnclaveRank();
        if (null !== $rankEnclave && $personage->getHideEnclave() === false) {
            $rank['rankPath'] =
                $this->container->getParameter('enclave_upload_path') . '/' . $rankEnclave->getLevel()->getIconName();
            $rank['rankPathRelative'] = $rankEnclave->getLevel()->getIconName();
            $rank['rankName'] = "{$rankEnclave->getEnclave()->getName()} - {$rankEnclave->getName()}";
            $usedRankEnclave = true;
        }

        if (false === $usedRankEnclave) {
            $rankClan = $personage->getClanRank();
            if (null !== $rankClan && $personage->getHideClan() === false) {
                $rank['rankPath'] =
                    $this->container->getParameter('enclave_upload_path') . '/' . $rankClan->getLevel()->getIconName();
                $rank['rankPathRelative'] = $rankClan->getLevel()->getIconName();
                $rank['rankName'] = "{$rankClan->getEnclave()->getName()} - {$rankClan->getName()}";
                $usedRankClan = true;
            }
        }

        if (false === $usedRankEnclave && false === $usedRankClan){
            return array(
                'rankPath' => null,
                'rankName' => null
            );
        }

        return $rank;
    }
}