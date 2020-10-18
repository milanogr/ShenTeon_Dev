<?php

namespace Gdr\GameBundle;

use Doctrine\ORM\EntityNotFoundException;
use Gdr\GameBundle\Entity\ForumPost;
use Gdr\GameBundle\Entity\ForumThread;
use Gdr\GameBundle\Entity\Letter;
use Gdr\UserBundle\Entity\Personage;
use JMS\DiExtraBundle\Annotation\Inject;
use JMS\DiExtraBundle\Annotation\InjectParams;
use JMS\DiExtraBundle\Annotation\Service;
use JMS\DiExtraBundle\Annotation as DI;
use Symfony\Component\Debug\Exception\FatalErrorException;

/**
 * Class General
 *
 * Contiene alcuni metodi che saranno usati un po' ovunque.
 *
 * @Service
 */
class General
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
     * @Inject("exercise_html_purifier.default")
     * @var \HTMLPurifier
     */
    public $purifier;

    /**
     * @Inject("router")
     * @var \Symfony\Bundle\FrameworkBundle\Routing\Router
     */
    public $router;

    /**
     * @var \Gdr\UserBundle\Entity\Personage
     */
    protected $personage;

    /**
     * @Inject("gdr.forum")
     * @var \Gdr\GameBundle\Service\ForumService
     */
    public $forumService;

    /**
     * @return Personage
     */
    public function getPersonage()
    {
        if (null === $this->personage) {
            $id = $this->session->get('personage');

            $repo = $this->em->getRepository('GdrUserBundle:Personage');
            $this->personage = $repo->find($id);
        }

        return $this->personage;
    }

    /**
     * @param Letter $letter
     * @param null $group
     * @param ForumThread $thread
     *
     * @return Letter
     */
    public function createLetter(Letter $letter, $group = null, $thread = null)
    {
        $personage = $this->getPersonage();

        $letter->setSender($personage);
        $letter->setSenderName($personage->getName());

        if (null !== $thread) {

            $route = $this->router->generate('bacheca-show-thread', array('id' => $thread['id']));
            $preBody = "<p>Vi è stata segnalata una pergamena che potrebbe interessarVi: <a class='underlined' href='" . $route . "'>{$thread['title']}</a></p> <hr>";
            $letter->setBody($preBody . $this->forumService->purifyBody($letter->getBody(), $personage->getName()));
        } else {
            $letter->setBody($this->forumService->purifyBody($letter->getBody(), $personage->getName()));
        }

        // Livello e Rank
        if (false === $personage->getHideEnclave()) {
            if (false !== $personage->hasEnclave()) {
                $enclave = $personage->hasEnclave();
                $rank = $enclave->getName() . ": " . $personage->getEnclaveRank()->getName();
                $level = $personage->getEnclaveRank()->getLevel()->getIconName();

                $letter->setSenderLevelIcon($level);
                $letter->setSenderRankName($rank);
            }
        }
        $letter->setSenderRaceIcon($personage->getRaceIcon());
        $letter->setSenderRaceName("Razza: " . $personage->getRace()->getName());

        if (null !== $group) {
            $destinatari = array();

            if ($group == Letter::GROUP_ENCLAVE) {
                $enclave = $this->getPersonage()->hasEnclave();
                $letter->setSpecial("[ML a {$enclave->getName()}]");

                $destinatari = $this->em->getRepository('GdrUserBundle:Personage')
                    ->getPersonagesByEnclave($enclave->getId());
            }
            if ($group == Letter::GROUP_CLAN) {
                $enclave = $this->getPersonage()->hasClan();
                $letter->setSpecial("[ML a {$enclave->getName()}]");
                $destinatari = $this->em->getRepository('GdrUserBundle:Personage')
                    ->getPersonagesByEnclave($enclave->getId());
            }
            if ($group == Letter::GROUP_MOD) {
                $letter->setSpecial("[ML a Moderatori]");
                $destinatari = $this->em->getRepository('GdrUserBundle:Personage')
                    ->getPersonagesModerator();
            }
            if ($group == Letter::GROUP_FATE) {
                $letter->setSpecial("[ML a Fato]");
                $destinatari = $this->em->getRepository('GdrUserBundle:Personage')
                    ->getPersonagesFate();
            }
            if ($group == Letter::GROUP_ALL) {
                $this->sendLetterToAll($letter);

                return $letter;
            }
            if ($group == Letter::GROUP_ONLINE) {
                $this->sendLetterToAll($letter, true);

                return $letter;
            }

            foreach ($destinatari as $d) {

                $newLetter = clone $letter;

                $newLetter->setReceiver($d);
                $this->em->persist($newLetter);
            }
        } else {
            $receiver = $this->em
                ->getRepository('GdrUserBundle:Personage')
                ->findOneBy(
                    array(
                        'name' => $letter->getReceiverName()
                    )
                );
            $letter->setReceiver($receiver);
            $this->em->persist($letter);
        }

        $this->em->flush();

        return $letter;
    }

    public function sendLetterToAll(Letter $letter, $forOnline = false)
    {
        if (false === $forOnline) {
            $all = $this->em->getRepository('GdrUserBundle:Personage')
                ->getPersonagesId();
        } else {
            $all = $this->em->getRepository('GdrUserBundle:Online')
                ->getPersonageOnlineIds();
        }

        $values = array();
        $sender_id = $letter->getSender() ? $letter->getSender()->getId() : null;
        $sender_name = $letter->getSenderName();
        $body = $this->em->getConnection()->quote($this->forumService->purifyBody($letter->getBody(), $letter->getSender()->getId()), \PDO::PARAM_STR);
        $created = date('Y-m-d H:i:s');
        $category = $letter->getCategory();
        $special = "[ML Generale]";

        foreach ($all as $id) {
            $values[] = "({$sender_id}, {$id['id']}, '{$sender_name}', {$body}, 0, 0, '{$created}', 1, {$category}, '{$special}', 0, 0, 0)";
        }

        $this->createLetterDQL($values);
    }

    public function sendLetterTNotifyThreads(Letter $letter, $ids = null)
    {
        $values = array();
        $sender_id = "NULL";
        $sender_name = $letter->getSenderName();

        $body = $this->em->getConnection()->quote(
            $this->forumService->purifyBody($letter->getBody(), $sender_id)
        );

        $created = date('Y-m-d H:i:s');

        foreach ($ids as $id) {
            $values[] = "({$id['id']}, '{$sender_name}', {$body}, 0, 0, '{$created}', 0, 1, 0, 0, 0)";
        }

        $valuesForSql = implode(', ', array_values($values));
        $conn = $this->em->getConnection()->prepare(
            'INSERT INTO Letter (receiver_id, senderName, body, isRead, isDeleted, createdAt, nameAsAdmin, category, isForward, nameAsMod, nameAsFate) VALUES ' . $valuesForSql
        );
        $conn->execute();
    }

    public function createSystemLetter($body, $destinatario_id, $mittenteName)
    {
        @ob_start();
        $destinatario = $this->em->getRepository('GdrUserBundle:Personage')
            ->find($destinatario_id);

        if (null === $destinatario) {
            throw new EntityNotFoundException();
        }

        $letter = new Letter();
        $letter->setReceiver($destinatario);
        $letter->setBody($this->forumService->purifyBody($body, $mittenteName));
        $letter->setSenderName($mittenteName);
        $letter->setCategory(Letter::CATEGORY_ORG);

        $this->em->persist($letter);
        $this->em->flush();
        @ob_end_clean();
    }

    public function createLetterDQL($values)
    {
        $valuesForSql = implode(', ', array_values($values));
        $conn = $this->em->getConnection()->prepare(
            'INSERT INTO Letter (sender_id, receiver_id, senderName, body, isRead, isDeleted, createdAt, nameAsAdmin, category, special, isForward, nameAsMod, nameAsFate) VALUES ' . $valuesForSql
        );
        $conn->execute();
    }

    /**
     * Elimina tutte le missive di tutti i personaggi che sono più vecchie di 30 giorni.
     * Da mettere in CRON.
     */
    public function removeLettersOldest()
    {
        $date = new \DateTime("-90 days");

        $this->em->getRepository('GdrGameBundle:Letter')
            ->reallyDeleteBefore($date);
    }

    public function itemsToInventory($quantity, Personage $personage, \Gdr\ItemsBundle\Entity\Item $item)
    {
        if (!$quantity) {
            throw new \Exception('La quantità deve essere almeno 1!');
        }

        // Preparo i dati per la SQL diretta.
        if (null === $personage) {
            $personage_id = $this->getPersonage()->getId();
        } else {
            $personage_id = $personage->getId();
        }

        $item_id = $item->getId();
        $isEquipped = 0;
        $isInvisible = 0;
        $isDressed = 0;

        if (!$item->getDurationDays()) {
            $expireAt = null;
        } else {
            $expireAt = date('Y-m-d H:i:s', strtotime("+{$item->getDurationDays()} days"));
        }

        $values = array();

        for ($i = 1; $i <= $quantity; $i++) {
            if (null === $expireAt) {
                $values[] = "({$personage_id}, {$item_id}, {$isEquipped}, {$isInvisible}, null, {$isDressed})";
            } else {
                $values[] = "({$personage_id}, {$item_id}, {$isEquipped}, {$isInvisible}, '{$expireAt}', {$isDressed})";
            }
        }

        $valuesForSql = implode(', ', array_values($values));

        $conn = $this->em->getConnection()->prepare(
            'INSERT INTO Inventory (personage_id, item_id, isEquipped, isInvisible, expireAt, isDressed) VALUES ' . $valuesForSql
        );
        $conn->execute();
    }


    /**
     * E' giorno a Shenteon?
     *
     * @return bool
     */
    public function isDay()
    {
        $hour = date('H', time());

        return $hour >= 6 && $hour <= 19;
    }
}