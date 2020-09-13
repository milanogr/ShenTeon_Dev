<?php

namespace Gdr\GameBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * MarqueRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class MarqueRepository extends EntityRepository
{
    public function getAllMarques(){
        return $this->createQueryBuilder('m')
            ->orderBy('m.id', 'ASC')
            ->getQuery()
            ->useQueryCache(true)
            ->useResultCache(true, 60 * 2)
            ->getResult();
    }
}
