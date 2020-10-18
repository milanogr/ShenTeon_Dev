<?php

namespace Gdr\GameBundle\Listener;

use Doctrine\Common\EventArgs;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use Gdr\GameBundle\Entity\Enclave;
use Gdr\GameBundle\Entity\Forum;
use Gdr\GameBundle\Entity\ForumPost;
use Gdr\GameBundle\Entity\ForumThread;
use Gdr\GameBundle\Entity\Letter;
use Gdr\ItemsBundle\Entity\Inventory;
use Gdr\UserBundle\Entity\Personage;
use JMS\DiExtraBundle\Annotation\Service;
use JMS\DiExtraBundle\Annotation\Tag;
use JMS\DiExtraBundle\Annotation as DI;

/**
 * Class DoctrineUpdaterListener
 *
 * @package Gdr\GameBundle\Listener
 * @Service
 * @Tag("doctrine.event_listener", attributes = {"event" = "postPersist"})
 * @Tag("doctrine.event_listener", attributes = {"event" = "preRemove"})
 * @Tag("doctrine.event_listener", attributes = {"event" = "preUpdate"})
 */
class DoctrineUpdaterListener
{
    /**
     * Vale solo per gli Insert. Per gli update usare PostUpdate.
     * http://docs.doctrine-project.org/en/latest/reference/events.html
     *
     * @param LifecycleEventArgs $args
     */
    public function postPersist(LifecycleEventArgs $args)
    {
        $em = $args->getEntityManager();
        $entity = $args->getEntity();

        if ($entity instanceof ForumPost) {

            // Aggiorno ForumThread (lastPostAuthor, lastPostTime) con i dati di questo Post.
            $thread = $entity->getThread();

            // Il nome per la sezione ed il thread.
            if ($entity->getNameAsAdmin()) {
                $authorName = 'Gestione';
            } elseif ($entity->getNameAsMod()) {
                $authorName = 'Moderatore';

            } else {
                $authorName = $entity->getAuthorName();
            }

            // Il post è nuovo se il result della query è diverso da null.
            $isNewThread = $em->getRepository('GdrGameBundle:ForumPost')
                ->getLastPostOfThread($thread, $entity);

            if (null !== $isNewThread) {
                $thread->setLastPostAuthor($authorName);
                $thread->setReplied($thread->getReplied() + 1);
            }
            $thread->setLastPostTime($entity->getCreatedAt());

            if ($isNewThread) {
                $entity->setUpdatedAt(null);
                $thread->setFirstPostAuthor($entity->getAuthor());
            }

            $category = $thread->getCategory();
            $category->setLastPostAuthor($authorName);
            $category->setLastPostTime($entity->getCreatedAt());
            $category->setLastThread($thread);

            // Tutti i Post di questo Thread, tranne questo, vanno messi a lastPost = false.
            $em->getRepository('GdrGameBundle:ForumPost')
                ->updateAllToLastPostFalse($thread->getId(), $entity->getId());

            $em->persist($thread);
            $em->persist($category);
            $em->flush();
        }

        if ($entity instanceof Enclave) {

            $type = $entity->getIsClan() ? Forum::TYPE_CLAN : Forum::TYPE_ENCLAVE;

            $on = new Forum();
            $on->setEnclave($entity);
            $on->setName($entity->getName() . " [Bacheca On Game]");
            $on->setType($type);
            $on->setSorting(1);

            $org = new Forum();
            $org->setEnclave($entity);
            $org->setName($entity->getName() . " [Bacheca Organizzativa]");
            $org->setType($type);
            $org->setSorting(2);

            $off = new Forum();
            $off->setEnclave($entity);
            $off->setName($entity->getName() . " [Bacheca Off Game]");
            $off->setType($type);
            $off->setSorting(3);

            $em->persist($on);
            $em->persist($org);
            $em->persist($off);
            $em->flush();
        }

        if ($entity instanceof Personage) {
            $name = ucfirst(strtolower($entity->getName()));
            $entity->setName($name);
            $em->persist($entity);
            $em->flush();
        }

        if ($entity instanceof Letter) {
            // Accetto solo immagini provenienti da Shenteon.
            $pattern = '#src="(?!http://www.shenteon.com)[^>]+#';
            $replacement = '';
            $entity->setBody(preg_replace($pattern, $replacement, $entity->getBody()));
            $em->persist($entity);
            $em->flush();
        }
    }

    /**
     * @param LifecycleEventArgs $args
     */
    public function preRemove(LifecycleEventArgs $args)
    {
        $em = $args->getEntityManager();
        $entity = $args->getEntity();

        if ($entity instanceof ForumPost) {

            if ($entity->getIsFirstPost()) {

                // Chiamo il metodo che controlla qual'è l'ultimo posto di tutti i
                // thread escluso questo. Aggiorno ForumCategory.
                $thread = $entity->getThread();
                $category = $thread->getCategory();
                $newLastPost = $em->getRepository('GdrGameBundle:ForumPost')
                    ->getLastPostOfCategory($category->getId(), $entity->getId());

                if ($newLastPost) {
                    $newThread = $newLastPost->getThread();

                    if ($newLastPost->getNameAsAdmin()) {
                        $authorName = 'Gestione';
                    } elseif ($entity->getNameAsMod()) {
                        $authorName = 'Moderatore';

                    } else {
                        $authorName = $newLastPost->getAuthorName();
                    }

                    $category->setLastPostAuthor($authorName);
                    $category->setLastPostTime($newLastPost->getCreatedAt());
                    $category->setLastThread($newThread);

                } else {
                    $category->setLastPostAuthor(null);
                    $category->setLastPostTime(null);
                    $category->setLastThread(null);
                }
                $em->persist($category);

                // Se sono in cestino elimino, altrimenti non faccio nulla.
                if ($category->getIsJunk()) {
                    $em->remove($entity->getThread());
                    $em->persist($thread);
                }

                $em->flush();

            } elseif ($entity->getIsLastPost()) {
                // Chiamo il metodo che recupera l'ultimo post di questo Thread.
                // Lo imposto come post.isLastPost e category|thread.lastPostAuthor
                // AGGIORNO thread.replied a  -1.
                $thread = $entity->getThread();
                $category = $thread->getCategory();
                $newLastPost = $em->getRepository('GdrGameBundle:ForumPost')
                    ->getLastPostOfThread($thread, $entity->getId());

                $newThread = $newLastPost->getThread();

                if ($newLastPost->getNameAsAdmin()) {
                    $authorName = 'Gestione';
                } elseif ($entity->getNameAsMod()) {
                    $authorName = 'Moderatore';

                } else {
                    $authorName = $newLastPost->getAuthorName();
                }

                $category->setLastPostAuthor($authorName);
                $category->setLastPostTime($newLastPost->getCreatedAt());
                $category->setLastThread($newThread);

                $thread->setReplied($thread->getReplied() - 1);
                $thread->setLastPostAuthor($authorName);
                $thread->setLastPostTime($newLastPost->getCreatedAt());

                $em->persist($thread);
                $em->persist($category);
                $em->flush();

            } else {
                // Sto eliminando il Post come Moderatore.
                // AGGIORNO "replied" a  -1.
                $thread = $entity->getThread();
                $thread->setReplied($thread->getReplied() - 1);
                $em->persist($thread);
                $em->flush();
            }
        }

        if ($entity instanceof Inventory) {
            // E' una chiave?
            // E' il mio address?
            // Allora controllo se ho altre chiavi. Se così non fosse, tolgo il riferimento in Personage.
            if ($accessLocation = $entity->getItem()->getCanAccessLocation()) {

                if ($entity->getPersonage()->getAddress() == $accessLocation) {
                    $otherKeys = $em->getRepository('GdrItemsBundle:Inventory')
                        ->getKeysForLocationAndPersonage(
                            $accessLocation->getId(),
                            $entity->getPersonage()->getAddress(),
                            $entity->getId()
                        );

                   if (!$otherKeys){
                       $entity->getPersonage()->setAddress(null);
                       $em->persist($entity->getPersonage());
                       $em->flush();
                   }
                }
            }
        }
    }

    public function preUpdate(PreUpdateEventArgs $eventArgs)
    {
        if ($eventArgs->getEntity() instanceof Personage) {
            if ($eventArgs->hasChangedField('name')) {
                $eventArgs->setNewValue('name', ucfirst(strtolower($eventArgs->getNewValue('name'))));
            }
        }
    }
}