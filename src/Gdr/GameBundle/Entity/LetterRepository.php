<?php

namespace Gdr\GameBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Gdr\UserBundle\Entity\Personage;

/**
 * LetterRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class LetterRepository extends EntityRepository
{
    public function getActivesByOwner($pg_id)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.receiver = :personage')
            ->setParameter('personage', $pg_id)
            ->andWhere('m.isDeleted = :deleted')
            ->setParameter('deleted', false)
            ->orderBy('m.createdAt', 'desc')
            ->getQuery();
    }

    public function getNotReadedByOwner($pg_id)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.receiver = :personage')
            ->setParameter('personage', $pg_id)
            ->andWhere('m.isDeleted = false')
            ->andWhere('m.isRead = false')
            ->orderBy('m.createdAt', 'desc')
            ->getQuery()
            ->getResult();
    }

    public function fakeDeleteLetters($ids, $pg_id)
    {
        $qb = $this->createQueryBuilder('l');

        return $qb
            ->update()
            ->set('l.isDeleted', 1)
            ->where('l.receiver = :pg')
            ->andWhere($qb->expr()->in('l.id', '?1'))
            ->setParameters(
                array(
                    'pg' => $pg_id,
                    1 => $ids
                )
            )
            ->getQuery()
            ->execute();
    }

    public function getCountLetters($pg_id)
    {
        return $this->createQueryBuilder('l')
            ->select('COUNT(l.id)')
            ->andWhere('l.receiver = :personage')
            ->setParameter('personage', $pg_id)
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function countNotReadedLetters($pg_id)
    {
        return $this->createQueryBuilder('l')
                    ->select('COUNT(l.id)')
                    ->andWhere('l.receiver = :personage AND l.isRead = false AND l.isDeleted = false')
                    ->setParameter('personage', $pg_id)
                    ->getQuery()
                    ->getSingleScalarResult();
    }

    public function getActiveCountLetters($pg_id)
    {
        return $this->createQueryBuilder('l')
            ->select('COUNT(l.id)')
            ->andWhere('l.isDeleted = false')
            ->andWhere('l.receiver = :personage')
            ->setParameter('personage', $pg_id)
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function deleteOldest($limit, $pg_id)
    {
        $qb = $this->createQueryBuilder('l');

        $idsToDelete = $qb->select('l.id')
            ->andWhere('l.receiver = :personage')
            ->setParameter('personage', $pg_id)
            ->orderBy('l.createdAt', 'ASC')
            ->andWhere('l.isDeleted = false')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();


        $return = array();
        foreach ($idsToDelete as $id){
            array_push($return, $id['id']);
        }

        $this->fakeDeleteLetters($return, $pg_id);
    }

    public function reallyDeleteBefore($date){
        return $this->createQueryBuilder('l')
            ->delete()
            ->where('l.createdAt <= :date')
            ->setParameter('date', $date)
            ->andWhere('l.isDeleted = true')
            ->getQuery()
            ->execute();
    }

    public function reallyDeleteNotReadedBefore($date){
        return $this->createQueryBuilder('l')
            ->delete()
            ->where('l.createdAt <= :date')
            ->setParameter('date', $date)
            ->andWhere('l.isDeleted = false')
            ->getQuery()
            ->execute();
    }


    public function reallyDeleteSpecialOldest($date){
        return $this->createQueryBuilder('l')
            ->delete()
            ->where('l.createdAt <= :date')
            ->setParameter('date', $date)
            ->andWhere('l.special IS NOT NULL')
            ->getQuery()
            ->execute();
    }
}
