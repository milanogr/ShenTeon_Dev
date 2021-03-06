<?php

namespace Gdr\UserBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * TitleRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TitleRepository extends EntityRepository
{
    public function getAllNobles(){
        return $this->createQueryBuilder('t')
            ->innerJoin('GdrUserBundle:Personage', 'p', 'WITH', 'p.id = t.personage')
            ->innerJoin('GdrUserBundle:Surname', 's', 'WITH', 's.id = p.surname')
            ->innerJoin('GdrRaceBundle:Race', 'r', 'WITH', 'r.id = p.race')
            ->orderBy('t.sort', 'ASC')
            ->getQuery()
            ->setFetchMode('Title', 'Personage', 'EAGER')
            ->setFetchMode('Personage', 'Race', 'EAGER')
            ->setFetchMode('Personage', 'Surname', 'EAGER')
            ->getResult();
    }
}
