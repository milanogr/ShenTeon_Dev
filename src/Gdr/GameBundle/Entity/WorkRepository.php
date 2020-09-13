<?php

namespace Gdr\GameBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * TransactionRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class WorkRepository extends EntityRepository
{
    public function findWorks(){
        return $this->createQueryBuilder("w")
            ->orderBy("w.name", "ASC")
            ->getQuery()->execute();
    }

    public function findAvailableWorks(){
        return $this->createQueryBuilder("w")
            ->andHaving("w.slots + 1 < w.max")
            ->getQuery()->execute();
    }
}
