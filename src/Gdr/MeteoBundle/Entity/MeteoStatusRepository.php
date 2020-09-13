<?php

namespace Gdr\MeteoBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * MeteoStatusRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class MeteoStatusRepository extends EntityRepository
{
    public function getStatus(){
        return $this->createQueryBuilder('ms')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
