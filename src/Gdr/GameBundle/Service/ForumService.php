<?php

namespace Gdr\GameBundle\Service;

use Gdr\GameBundle\Entity\FollowThread;
use Gdr\GameBundle\Entity\ForumCategory;
use Gdr\GameBundle\Entity\ForumThread;
use Gdr\GameBundle\Entity\Letter;
use Gdr\GameBundle\Entity\ThreadReaded;
use Gdr\GameBundle\General;
use Gdr\UserBundle\Entity\Personage;
use JMS\DiExtraBundle\Annotation\Inject;
use JMS\DiExtraBundle\Annotation\InjectParams;
use JMS\DiExtraBundle\Annotation\Service;
use JMS\DiExtraBundle\Annotation as DI;

/**
 * Class Erario
 *
 * Contiene metodi per il forum.
 *
 * @DI\Service("gdr.forum", public=true)
 */
class ForumService
{
    /**
     * @Inject("doctrine.orm.entity_manager")
     * @var \Doctrine\ORM\EntityManager
     */
    public $em;

    /**
     * @Inject("exercise_html_purifier.default")
     * @var \HTMLPurifier
     */
    public $purifier;

    /**
     * @Inject("logger")
     * @var \Symfony\Bridge\Monolog\Logger
     */
    public $logger;

    /**
     * @Inject("simple_html_dom")
     * @var \simple_html_dom
     */
    public $simpleHTML;

    /**
     * @Inject("gdr.game_bundle.general")
     * @var General
     */
    public $general;

    public function refreshThreadReaded(Personage $personage, ForumThread $thread)
    {
        $readed = $this->em->getRepository('GdrGameBundle:ThreadReaded')
            ->findOneBy(
                array(
                    'personage' => $personage,
                    'thread' => $thread
                )
            );

        if (null === $readed) {
            $readed = new ThreadReaded();
            $readed->setPersonage($personage);
            $readed->setThread($thread);
        }

        $readed->setIsReaded(true);

        $this->em->persist($readed);
        $this->em->flush();
    }

    public function setThreadNotReaded(ForumThread $thread)
    {
        $this->em->getRepository('GdrGameBundle:ThreadReaded')
            ->updateThreadNotReaded($thread->getId());
    }

    public function setThreadNotReadedForMe(ForumThread $thread, Personage $personage)
    {
        $followed = $this->isFollowedThread($thread, $personage, true);

        if ($followed){
            $followed->setIsNotified(true);
            $this->em->persist($followed);
            $this->em->flush($followed);
        }
    }

    public function setStrilloneReaded(Personage $pg)
    {
        $strillone = $this->em->getRepository('GdrGameBundle:StrilloneReaded')
            ->findOneBy(array('personage' => $pg));

        $strillone->setLastUpdateStrillone(new \DateTime());
        $this->em->persist($strillone);
        $this->em->flush();
    }

    public function setAraldoReaded(Personage $pg)
    {
        $araldo = $this->em->getRepository('GdrGameBundle:StrilloneReaded')
            ->findOneBy(array('personage' => $pg));

        $araldo->setLastUpdateAraldo(new \DateTime());
        $this->em->persist($araldo);
        $this->em->flush();
    }

//    public function setThreadsReaded(Personage $personage, ForumCategory $category){
//
//        // Recupero gli id dei thread a aggiornare
//        $threads_id = $this->em->getRepository('GdrGameBundle:ThreadReaded')
//            ->getThreadNotReadedByCategoryForPersonage($personage->getId(), $category->getId());
//
//        var_dump($threads_id);exit;
//    }

    public function purifyBody($body, $pg_id = null)
    {
        $body = $this->purifier->purify($body);
        $this->simpleHTML->load($body);
        $imgs = $this->simpleHTML->find('img');
        $pattern = "#http://www.shenteon.com[^>]+#i";

        foreach ($imgs as $img) {
            $src = $img->src;

            if (!preg_match($pattern, $src)) {

                // Rimpiazzo l'elemento con un link
                $img->outertext = '<span class="gdrtooltip" title="Attenzione, questo url è esterno a Shenteon">' . $src . '</span>';
            }
        }

        return $this->simpleHTML->root->innertext();
    }

    /**
     * - sottoscrivo un thread e viene creato il record in FolloWThread;
     * - rimuovo la sottostrscrizione e viene eliminato il record in FollowThread;
     * - se sottoscrivo, $isNotified è false;
     * - se qualcuno risponde e $isNotified è false, mando la segnalazione e setto $isNotified = true;
     * - se apro il thread, $isNotified viene settato a false;
     */
    public function followThread(ForumThread $thread, Personage $personage)
    {
        if (false === $this->isFollowedThread($thread, $personage)){
            $followed = new FollowThread();
            $followed->setPersonage($personage);
            $followed->setThread($thread);
            $this->em->persist($followed);
            $this->em->flush();
        }
    }

    public function unfollowThread(ForumThread $thread, Personage $personage)
    {
        $followed = $this->em->getRepository('GdrGameBundle:FollowThread')
            ->findOneBy(
                array(
                    'personage' => $personage,
                    'thread' => $thread
                )
            );

        if ($followed){
            $this->em->remove($followed);
            $this->em->flush();
        }
    }

    public function isFollowedThread(ForumThread $thread, Personage $personage, $returnObj = false)
    {
        $followed = $this->em->getRepository('GdrGameBundle:FollowThread')
            ->findOneBy(
                array(
                    'personage' => $personage,
                    'thread' => $thread
                )
            );

        if ($returnObj){
            return $followed == null ? false : $followed;
        }

        return $followed == null ? false : true;
    }

    public function isNotifiedFollowedThread(ForumThread $thread, Personage $personage)
    {
        $followed = $this->em->getRepository('GdrGameBundle:FollowThread')
            ->findOneBy(
                array(
                    'personage' => $personage,
                    'thread' => $thread
                )
            );

        return $followed && $followed->getIsNotified() ? true : false;
    }

    public function notifyFollowedThread(ForumThread $thread, $link)
    {
        $letter = new Letter();
        $letter->setSenderName("Bacheca");
        $letter->setBody("<p>Il thread <strong><a href='{$link}'>{$thread->getTitle()}</a></strong> che stai seguendo ha ricevuto una o più risposte dalla tua ultima visita.</p>");

        // Recupero tutti i Thread seguiti con questo id e non notificati
        $followers = $this->em->getRepository('GdrGameBundle:FollowThread')
            ->getPersonagesIdForFollow($thread->getId());

        if (count($followers)){

            // Invia una "ML" a chi sta seguendo il thread
            $this->general->sendLetterTNotifyThreads($letter, $followers);

            // Imposta a letto
            $follows = $this->em->getRepository('GdrGameBundle:FollowThread')
                ->getFollowsByThread($thread->getId());

            foreach ($follows as $f){
                $f->setIsNotified(true);
                $this->em->persist($f);
            }

            $this->em->flush();
        }
    }

    public function refreshThreadFollowed(ForumThread $thread, Personage $personage){

        $follow = $this->em->getRepository('GdrGameBundle:FollowThread')
            ->findOneBy(
                array(
                    'personage' => $personage,
                    'thread' => $thread
                )
            );

        if ($follow && $follow->getIsNotified() === true) {
            $follow->setIsNotified(false);
            $this->em->flush($follow);
        }
    }
}