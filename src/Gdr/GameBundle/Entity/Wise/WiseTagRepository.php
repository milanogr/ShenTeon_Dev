<?php

namespace Gdr\GameBundle\Entity\Wise;

/**
 * WiseTagRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class WiseTagRepository extends \Doctrine\ORM\EntityRepository
{
    public function getAll(){
        return $this
            ->createQueryBuilder('wt')
            ->orderBy('wt.name')
            ->getQuery()
            ->useQueryCache(true)
            ->useResultCache(true, 60 * 15)
            ->getResult()
            ;
    }

    public function getByName($tag){
        return $this
            ->createQueryBuilder('wt')
            ->where('wt.name = :tag')
            ->setParameter('tag', $tag)
            ->getQuery()
            ->setMaxResults(1)
            ->getOneOrNullResult()
            ;
    }
}
