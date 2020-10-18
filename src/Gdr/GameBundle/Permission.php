<?php

namespace Gdr\GameBundle;

use Doctrine\Bundle\DoctrineBundle\Registry;
use Gdr\GameBundle\Entity\Chat;
use Gdr\GameBundle\Entity\ForumPost;
use Gdr\GameBundle\Entity\ForumThread;
use Gdr\GameBundle\Entity\Letter;
use Gdr\GameBundle\Entity\Location;
use Gdr\UserBundle\Entity\Personage;
use Gdr\UserBundle\Entity\User;
use JMS\DiExtraBundle\Annotation\Inject;
use JMS\DiExtraBundle\Annotation\InjectParams;
use JMS\DiExtraBundle\Annotation\Service;
use JMS\DiExtraBundle\Annotation as DI;

/**
 * Class General
 *
 * Contiene alcuni metodi che saranno usati un po' ovunque.
 *
 * @Service("gdr.permission")
 */
class Permission
{
    /**
     * @Inject("doctrine.orm.entity_manager")
     * @var \Doctrine\ORM\EntityManager
     */
    public $em;

    /**
     * @Inject("session")
     * @var \Symfony\Component\HttpFoundation\Session\Session
     */
    public $session;

    /**
     * @Inject("security.context")
     * @var \Symfony\Component\Security\Core\SecurityContext
     */
    public $security;

    protected $personageId = null;

    private $isMod = null;
    private $isModChat = null;
    private $isModForum = null;
    private $isFate = null;
    private $canAraldo = null;
    private $isMaster = null;
    private $canMarry = null;
    private $personage = null;
    private $isWarrior = null;
    private $isViceMaster = null;

    protected function getPersonageId()
    {
        if (null === $this->personageId) {
            $this->personageId = $this->session->get('personage');
        }

        return $this->personageId;
    }

    /**
     * @return Personage
     */
    public function getPersonage()
    {
        if (null === $this->personage) {
            $id = $this->getPersonageId();

            $repo = $this->em->getRepository('GdrUserBundle:Personage');
            $this->personage = $repo->find($id);
        }

        return $this->personage;
    }

    public function isAdmin()
    {
        return $this->security->isGranted('ROLE_ADMIN');
    }

    public function isMod()
    {
        if (null === $this->isMod) {
            if ($this->isModChat() || $this->isModForum() || $this->isAdmin()) {
                $this->isMod = true;
            } else {
                $this->isMod = false;
            }
        }

        return $this->isMod;
    }

    public function isModForum(ForumPost $post = null, ForumThread $thread = null, Personage $pg = null)
    {
        if (($post || $thread)) {
            $pg = $this->getPersonage();

            // E' di Enclave?
            if ($post) {
                $forum = $post->getThread()->getCategory()->getForum();
            } else {
                $forum = $thread->getCategory()->getForum();
            }

            if ($forum->getEnclave()) {
                if ($pg->hasEnclave() == $forum->getEnclave()) {
                    if ($pg->getEnclaveRank()->getIsMaster() || $pg->getEnclaveRank()->getIsViceMaster()) {
                        return true;
                    } else {
                        return false;
                    }
                }
                if ($pg->hasClan() == $forum->getEnclave()) {
                    if ($pg->getClanRank()->getIsMaster() || $pg->getClanRank()->getIsViceMaster()) {
                        return true;
                    } else {
                        return false;
                    }
                }
            }
        }

        if (null === $this->isModForum) {
            $this->isModForum = $this->em->getRepository('GdrItemsBundle:Inventory')
                ->canModerateForum($this->getPersonageId());
        }

        return $this->isModForum;
    }

    public function isModChat()
    {
        if (null === $this->isModChat) {
            $this->isModChat = $this->em->getRepository('GdrItemsBundle:Inventory')
                ->canModerateChat($this->getPersonageId());
        }

        return $this->isModChat;
    }

    public function isFate()
    {
        if (null === $this->isFate) {
            $this->isFate = $this->em->getRepository('GdrItemsBundle:Inventory')
                ->canFate($this->getPersonageId());
        }

        return $this->isFate;
    }

    public function canAraldo()
    {
        if (null === $this->canAraldo) {
            $this->canAraldo = $this->em->getRepository('GdrItemsBundle:Inventory')
                ->canAraldo($this->getPersonageId());
        }

        return $this->canAraldo;
    }

    public function canAccessLocation($location_id)
    {
        return $this->em->getRepository('GdrItemsBundle:Inventory')
            ->canAccessLocation($this->getPersonageId(), $location_id);
    }

    public function canMarry()
    {
        if (null === $this->canMarry) {
            $this->canMarry = $this->em->getRepository('GdrItemsBundle:Inventory')
                ->canMarry($this->getPersonageId());
        }

        return $this->canMarry;
    }

    public function canViewGrimory($level)
    {
        return $this->em->getRepository('GdrItemsBundle:Inventory')
            ->canViewGrimory($this->getPersonageId(), $level);
    }

    public function isMaster()
    {
        if (null === $this->isMaster) {
            $result = $this->em->getRepository('GdrUserBundle:Personage')
                ->isMaster($this->getPersonageId());

            $this->isMaster = null === $result || count($result) == 0 ? false : true;
        }

        return $this->isMaster;
    }

    public function isViceMaster()
    {
        if (null === $this->isViceMaster) {
            $result = $this->em->getRepository('GdrUserBundle:Personage')
                ->isViceMaster($this->getPersonageId());

            $this->isViceMaster = null === $result || count($result) == 0 ? false : true;
        }

        return $this->isViceMaster;
    }

    public function isMarried()
    {
        $marriage = $this->em->getRepository("GdrUserBundle:Wedding")
            ->findActiveMarriageByPersonage($this->getPersonageId());

        return (is_null($marriage)) ? false : true;
    }

    public function hasKey(Location $location)
    {

        $key = $this->em->getRepository('GdrItemsBundle:Inventory')
            ->getKeyForLocationAndPersonage($location->getId(), $this->getPersonageId());

        return $key !== null ? true : false;
    }

    public function isBanned(User $user)
    {
        $now = new \DateTime();
        $return = false;

        $esiliato = $this->em->getRepository('GdrUserBundle:Esilio')
            ->findBy(array("banned" => $user));

        foreach ($esiliato as $e){
            if ($now <= $e->getUntil()){
                $return = true;
            }
        }

        return $return;
    }

    public function isExWarrior(Personage $personage)
    {
        // NO Enclave Combattente e Si Ex enclave
        if ($this->isWarrior($personage)) {
            return false;
        } else {
            return $personage->getIsExWarrior();
        }
    }

    public function isWarrior(Personage $personage)
    {
        if ($this->isWarrior === null) {
            $enclaveRank = $personage->getEnclaveRank();

            if ($enclaveRank) {
                return $this->isWarrior = $enclaveRank->getEnclave()->getCategory()->getIsCombat();
            }

            return false;
        }

        return $this->isWarrior;
    }

    public function isNotWarrior(Personage $personage)
    {
        return $this->isExWarrior($personage) === false && $this->isWarrior($personage) === false;
    }

    public function isNotExAndWarrior(Personage $personage){
        return !$this->isExWarrior($personage) && !$this->isWarrior($personage);
    }

    public function canBeInvisible()
    {
        return $this->isAdmin() || $this->isFate();
    }
}