<?php

namespace Gdr\GameBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * EnclaveRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class EnclaveRepository extends EntityRepository
{
    public function getBaseQuery()
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.isActive = :true')
            ->setParameter('true', true)
            ->orderBy('e.category')
            ->addOrderBy('e.name');
    }

    public function getBaseQueryForEnclave()
    {
        return $this->getBaseQuery()
            ->andWhere('e.isClan = :false')
            ->setParameter('false', false);
    }

    public function getBaseQueryForClan()
    {
        return $this->getBaseQuery()
            ->andWhere('e.isClan = :true')
            ->setParameter('true', true);
    }

    /**
     * @param $enclave
     * @return \Doctrine\ORM\QueryBuilder
     */
    protected function getEnclaveMembers($enclave){
        return $this->getEntityManager()->getRepository("GdrUserBundle:Personage")
            ->createQueryBuilder("p")
            ->innerJoin("p.enclaveRank", "er")
            ->innerJoin("er.enclave", "e")
            ->andWhere("e.id = :eid")
            ->andWhere("er.isMaster = 0")
            ->setParameter("eid", $enclave);
    }

    /**
     * @param $clan
     * @return \Doctrine\ORM\QueryBuilder
     */
    protected function getClanMembers($clan){
        return $this->getEntityManager()->getRepository("GdrUserBundle:Personage")
            ->createQueryBuilder("p")
            ->innerJoin("p.clanRank", "cr")
            ->innerJoin("cr.enclave", "e")
            ->andWhere("e.id = :cid")
            ->andWhere("cr.isMaster = false")
            ->setParameter("cid", $clan);
    }

    /**
     * @param $personage
     * @param $enclave
     * @return \Gdr\UserBundle\Entity\Personage
     */
    public function findPersonageInEnclave($personage, $enclave){
        return $this->getEnclaveMembers($enclave)
            ->andWhere("p.id = :pid")
            ->setParameter("pid", $personage)
            ->setMaxResults(1)
            ->getQuery()->getOneOrNullResult();
    }

    /**
     * @param $personage
     * @param $clan
     * @return \Gdr\UserBundle\Entity\Personage
     */
    public function findPersonageInClan($personage, $clan){
        return $this->getClanMembers($clan)
            ->andWhere("p.id = :pid")
            ->setParameter("pid", $personage)
            ->setMaxResults(1)
            ->getQuery()->getOneOrNullResult();
    }

    public function findSortedEnclaveMembers($enclave){
        return $this->getEnclaveMembers($enclave)
            ->orderBy("er.level", "DESC")
            ->getQuery()->getResult();
    }

    public function findSortedClanMembers($clan){
        return $this->getClanMembers($clan)
            ->orderBy("cr.level", "DESC")
            ->getQuery()->getResult();
    }

    public function getListForEnclave($enclave_id, $minLevel = null)
    {
        $qb = $this->getBaseQuery();
            $qb->select('p.name as pgName, er.name as rankName, el.iconName as levelIcon, p.hideEnclave as pgHideEnclave, p.hideClan as pgHideClan ,e.isClan as isClan')
            ->addSelect('er.iconName as rankIcon, r.maleIconName as raceMaleIcon, r.femaleIconName as raceFemaleIcon')
            ->addSelect('p.gender as pgGender, e.bannerName as bannerName, e.annex as annex, e.name as name, e.id as id, e.notOfficial as notOfficial')
            ->leftJoin('GdrGameBundle:EnclaveRank', 'er', 'WITH', "er.enclave = e.id")
            ->leftJoin('GdrGameBundle:EnclaveLevel', 'el', 'WITH', "er.level = el.id")
            ->leftJoin(
                'GdrUserBundle:Personage',
                'p',
                'WITH',
                "p.enclaveRank = er.id OR p.clanRank = er.id"
            )
            ->leftJoin('GdrRaceBundle:Race', 'r', 'WITH', 'r.id = p.race');

        if (null !== $minLevel){
            $qb->andWhere('el.name >= :minLevel')
                ->setParameter('minLevel', $minLevel)
            ;
        }

        return $qb->andWhere('er.enclave = :enclave')
            ->setParameter('enclave', $enclave_id)
            ->orderBy('el.name', 'DESC')
            ->addOrderBy('er.name', 'ASC')
            ->addOrderBy('p.name', 'ASC')
            ->groupBy('p.id')
            ->addGroupBy('er.id')
            ->getQuery()
            ->getResult();
    }

    public function getAllEnclavi()
    {
        return $this->getBaseQueryForEnclave()
            ->getQuery()
            ->getResult();
    }

    public function getAllClan()
    {
        return $this->getBaseQueryForClan()
            ->getQuery()
            ->getResult();
    }
}
