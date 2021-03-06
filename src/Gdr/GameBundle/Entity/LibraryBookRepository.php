<?php

namespace Gdr\GameBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * LibraryBookRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class LibraryBookRepository extends EntityRepository
{
    /**
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function getSortedBooks(){
        return $this->createQueryBuilder("lb")
            ->orderBy("lb.sort", "ASC");
    }

    /**
     * @param $section
     * @return mixed
     */
    public function findSortedBooksBySection($section){
        return $this->getSortedBooks()
            ->andWhere("lb.section = :section")
            ->setParameter("section", $section)
            ->getQuery()->execute();
    }
}
