<?php

namespace Gdr\GameBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * EnclaveCategoryRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class EnclaveCategoryRepository extends EntityRepository
{
    public function getBaseQuery()
    {
        return $this->createQueryBuilder('ec')
            ->innerJoin('GdrGameBundle:Enclave', 'e', 'WITH', 'e.category = ec.id')
            ->andWhere('e.isActive = :true')
            ->setParameter('true', true)
            ->groupBy('e.category')
            ->orderBy('ec.name');
    }

    public function getCategoriesWithEnclave()
    {
        return $this->getBaseQuery()
            ->andWhere('e.isClan = false')
            ->andWhere('e.notOfficial = false')
            ->getQuery()
            ->getResult();
    }

    public function getCategoriesWithEnclaveUnofficial()
    {
        return $this->getBaseQuery()
            ->andWhere('e.isClan = false')
            ->andWhere('e.notOfficial = true')
            ->getQuery()
            ->getResult();
    }

    public function getCategoriesWithClan()
    {
        return $this->getBaseQuery()
            ->andWhere('e.isClan = :true')
            ->setParameter('true', true)
            ->getQuery()
            ->getResult();
    }
}
