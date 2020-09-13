<?php

namespace Gdr\ItemsBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query\Expr;


class ItemTypeRepository extends EntityRepository
{
    public function getCategoriesForInventory()
    {
        return $this->createQueryBuilder('it')
            ->where('it.name != :vestiti')
            ->setParameter('vestiti', ItemType::VESTITI)
            ->orderBy('it.name', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findCategoriesByMarket($market)
    {
        return $this->createQueryBuilder('it')
            ->leftJoin('it.markets', 'm')
            ->andWhere('m.id = :market')
            ->setParameter('market', $market)
            ->andWhere('it.hideFromMarkets = false')
            ->orderBy('it.name', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findCategoryByMarket($market)
    {
        return $this->createQueryBuilder('it')
            ->leftJoin('it.markets', 'm')
            ->andWhere('m.id = :market')
            ->setParameter('market', $market)
            ->andWhere('it.hideFromMarkets = false')
            ->addOrderBy('m.name', 'DESC')
            ->getQuery()
            ->setMaxResults(1)
            ->getOneOrNullResult();
    }
}