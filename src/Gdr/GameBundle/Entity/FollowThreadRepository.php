<?php

namespace Gdr\GameBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * FollowThreadRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class FollowThreadRepository extends EntityRepository
{
    public function getPersonagesIdForFollow($thread)
    {
        return $this->createQueryBuilder('ft')
            ->select('p.id')
            ->innerJoin('ft.personage', 'p')
            ->where('ft.isNotified = false')
            ->andWhere('ft.thread = :thread')
            ->setParameter('thread', $thread)
            ->getQuery()
            ->getScalarResult();
    }

    public function getFollowsByThread($thread){
        return $this->createQueryBuilder('ft')
            ->where('ft.isNotified = false')
            ->andWhere('ft.thread = :thread')
            ->setParameter('thread', $thread)
            ->getQuery()
            ->getResult();
    }
}
