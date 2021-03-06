<?php

namespace Gdr\UserBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * EsilioRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class EsilioRepository extends EntityRepository
{
    public function getBaseQuery()
    {
        return $this->createQueryBuilder('e');
    }

    public function getSortedQuery()
    {
        return $this->getBaseQuery()
            ->orderBy('e.until', 'DESC')
            ->getQuery();
    }

    public function getActiveEsilio($user)
    {
        return $this->getBaseQuery()
            ->andWhere('e.banned = :user')
            ->setParameter('user', $user)
            ->andWhere('e.until > :now')
            ->setParameter('now', new \DateTime())
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
