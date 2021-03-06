<?php

namespace Gdr\UserBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * PersonageRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PersonageRepository extends EntityRepository
{

    public function getArrayPersonagesByUser(User $user)
    {
        $result = $this->createQueryBuilder('p')
            ->select('p.id, p.name')
            ->andWhere('p.user = :user')
            ->setParameter('user', $user)
            ->getQuery()
            ->getResult();


        $personages = array();

        foreach ($result as $r) {
            $id = $r['id'];
            $name = $r['name'];
            $personages[$id] = $name;
        }

        return $personages;
    }

    public function getPersonagesId()
    {
        return $this->createQueryBuilder('p')
            ->select('p.id as id')
            ->getQuery()
            ->getResult();
    }

    /**
     * Recupera i personaggi appena usciti.
     *
     * @return array
     */
    public function getJustLoggedInAndOut()
    {
        return $this->createQueryBuilder('p')
            ->select(
                'r.name as raceName, r.maleIconName as raceMaleIcon, p.gender, p.name as name, p.id as id,
                r.femaleIconName as raceFemaleIcon, p.lastLogin as lastLogin, p.lastLogout as lastLogout'
            )
            ->innerJoin('p.race', 'r')
            ->innerJoin('GdrUserBundle:Online', 'o', 'WITH', 'o.personage = p.id')
            ->andWhere('p.lastLogout >= :time OR p.lastLogin >= :time')
            ->setParameter('time', new \DateTime('-5 minutes'))
            ->andWhere('o.isInvisible = false')
            ->orderBy('p.name')
            ->getQuery()
            ->getResult();
    }

    /**
     * @param Personage $personage
     *
     * @return mixed
     */
    public function getCurrentLocation(Personage $personage)
    {
        return $this->createQueryBuilder('p')
            ->select('l.name, l.description, o.id, p.id')
            ->leftJoin('p.online', 'o')
            ->leftJoin('o.location', 'l')
            ->andWhere('p.id = :personage')
            ->setParameter('personage', $personage)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function getPersonageByNameForAvatar($name)
    {
        return $this->createQueryBuilder('p')
            ->leftJoin('GdrUserBundle:Surname', 's', 'WITH', 'p.surname = s.id')
            ->leftJoin('GdrGameBundle:EnclaveRank', 'er', 'WITH', 'p.enclaveRank = er.id')
            ->leftJoin('GdrGameBundle:Enclave', 'e', 'WITH', 'e.id = er.enclave')
            ->leftJoin('GdrRaceBundle:Race', 'r', 'WITH', 'p.race = r.id')
            ->select(
                'p.name, s.value AS surname, p.age, p.strength, p.sapience, p.createdAt, p.bagAmount, p.bankAmount'
            )
            ->addSelect('p.relationship, p.friendship, p.activity, p.description, p.nameExtended')
            ->addSelect('r.name AS raceName')
            ->addSelect('er.name AS enclaveRank, e.name as enclaveName')
            ->andWhere('p.name = :name')
            ->setParameter('name', $name)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function getInfosPersonageForChat($name)
    {
        return $this->createQueryBuilder('p')
            ->leftJoin('p.race', 'r')
            ->leftJoin('p.skillsLevel', 'sl')
            ->leftJoin('p.eyeColor', 'ec')
            ->leftJoin('p.hairColor', 'hc')
            ->andWhere('p.name = :name')
            ->setParameter('name', $name)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function getPersonagesByEnclave($id)
    {
        return $this->createQueryBuilder('p')
            ->innerJoin('GdrGameBundle:EnclaveRank', 'er', 'WITH', 'p.enclaveRank = er.id OR p.clanRank = er.id')
            ->innerJoin('GdrGameBundle:Enclave', 'e', 'WITH', 'er.enclave = e.id')
            ->andWhere('e.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult();
    }

    public function getPersonagesModerator()
    {
        return $this->createQueryBuilder('p')
            ->innerJoin('GdrItemsBundle:Inventory', 'i', 'WITH', 'i.personage = p.id')
            ->innerJoin('GdrItemsBundle:Item', 'it', 'WITH', 'it.id = i.item')
            ->andWhere('it.canModerateChat = true OR it.canModerateForum = true')
            ->groupBy('p.id')
            ->getQuery()
            ->getResult();
    }

    public function getOnlinePersonagesModerator()
    {
        return $this->createQueryBuilder('p')
            ->innerJoin('GdrItemsBundle:Inventory', 'i', 'WITH', 'i.personage = p.id')
            ->innerJoin('GdrItemsBundle:Item', 'it', 'WITH', 'it.id = i.item')
            ->innerJoin('GdrUserBundle:Online', 'o', 'WITH', 'o.personage = p.id')
            ->andWhere('o.isActive = true')
            ->andWhere('it.canModerateChat = true OR it.canModerateForum = true')
            ->groupBy('p.id')
            ->getQuery()
            ->getResult();
    }

    public function getPersonagesFate()
    {
        return $this->createQueryBuilder('p')
            ->innerJoin('GdrItemsBundle:Inventory', 'i', 'WITH', 'i.personage = p.id')
            ->innerJoin('GdrItemsBundle:Item', 'it', 'WITH', 'it.id = i.item')
            ->andWhere('it.canFate = true')
            ->groupBy('p.id')
            ->getQuery()
            ->getResult();
    }

    public function canStudy($personage_id)
    {
        $date = $this->createQueryBuilder('p')
            ->select('p.canStudyGrimoryAt')
            ->andWhere('p.id = :id')
            ->setParameter('id', $personage_id)
            ->getQuery()
            ->getSingleScalarResult();

        return new \DateTime($date) <= new \DateTime() ? true : false;
    }

    public function getPersonagesWithBirthday()
    {
        $query = $this->createQueryBuilder("p")
            ->innerJoin("p.skillsLevel", "l")
            ->innerJoin("l.race", "r")
            ->andWhere("r.monthToOlder > 0")
            ->andWhere("p.isDead = false")
            ->andWhere("DATE_ADD(p.lastBirthday, r.monthToOlder, 'month') <= CURRENT_DATE()")
//            ->andWhere("DATE_SUB(CURRENT_DATE(), r.monthToOlder, 'month') >= p.lastBirthday")
            ->getQuery()
            ->getResult();

        return $query;
    }

    public function getPersonagesOverAge()
    {
        $query = $this->createQueryBuilder("p")
            ->innerJoin("p.skillsLevel", "l")
            ->innerJoin("p.race", "r")
            ->andWhere("r.monthToOlder > 0")
            ->andWhere("r.ageDeath < p.age")
            ->andWhere("p.isDead = false")
            ->getQuery()
            ->getResult();

        return $query;
    }

    public function canAdvanceRaceLevel($experience)
    {
        // Indica il livello cui posso avanzare. Se non posso, è false.
        $return = false;

        if ($experience >= 150 && $experience < 300) {
            $return = 2;
        }

        if ($experience >= 300 && $experience < 600) {
            $return = 3;
        }

        if ($experience >= 600 && $experience < 1200) {
            $return = 4;
        }

        if ($experience >= 1200 && $experience < 2000) {
            $return = 5;
        }

        if ($experience >= 2000) {
            $return = 6;
        }

        return $return;
    }

    public function findSoulsByName($name)
    {
        return $this->createQueryBuilder("p")
            ->andWhere("p.isDead = true")
            ->andWhere(
                "(p.isSuicide = true AND DATE_ADD(p.deadAt, '21', 'day') > CURRENT_DATE()) OR (p.isSuicide = false AND DATE_ADD(p.deadAt, '7', 'day') > CURRENT_DATE())"
            )
            ->andWhere("p.name = :name")
            ->setParameter("name", $name)
            ->getQuery()
            ->getResult();
    }

    public function findSoulByName($name)
    {
        return $this->createQueryBuilder("p")
            ->andWhere("p.isDead = true")
            ->andWhere(
                "(p.isSuicide = true AND DATE_ADD(p.deadAt, '21', 'day') > CURRENT_DATE()) OR (p.isSuicide = false AND DATE_ADD(p.deadAt, '7', 'day') > CURRENT_DATE())"
            )
            ->andWhere("p.name = :name")
            ->setParameter("name", $name)
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function getPersonagesWithRace()
    {
        return $this->createQueryBuilder('p')
            ->addSelect(
                'r.name as raceName, r.maleIconName as raceMaleIcon,
                r.femaleIconName as raceFemaleIcon, s.value as surname'
            )
            ->innerJoin('p.race', 'r')
            ->leftJoin('p.surname', 's')
            ->orderBy('p.name')
            ->getQuery()
            ->getResult();
    }

    public function isMaster($id)
    {
        return $this->createQueryBuilder('p')
            ->leftJoin('p.enclaveRank', 'er')
            ->leftJoin('p.clanRank', 'cr')
            ->andWhere('er.isMaster = true OR cr.isMaster = true')
            ->andWhere('p.id = :id')
            ->setParameter("id", $id)
            ->getQuery()
            ->getResult();
    }

    public function isViceMaster($id)
    {
        return $this->createQueryBuilder('p')
            ->leftJoin('p.enclaveRank', 'er')
            ->leftJoin('p.clanRank', 'cr')
            ->andWhere('er.isViceMaster = true OR cr.isViceMaster = true')
            ->andWhere('p.id = :id')
            ->setParameter("id", $id)
            ->getQuery()
            ->getResult();
    }

    public function getLastRegistered()
    {
        return $this->createQueryBuilder('p')
            ->addSelect(
                'r.name as raceName, r.maleIconName as raceMaleIcon,
                r.femaleIconName as raceFemaleIcon'
            )
            ->innerJoin('p.race', 'r')
            ->andWhere('p.createdAt >= :date')
            ->setParameter('date', new \DateTime("-14 days"))
            ->orderBy('p.createdAt', 'DESC')
            ->getQuery()
            ->getResult();

    }

    public function getTotalPersonages()
    {
        return $this->createQueryBuilder('p')
            ->select('COUNT(p.id) as totale')
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function getPgForXp()
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.experience >= 150')
            ->getQuery()
            ->getResult();
    }

    public function getMannari()
    {
        return $this->createQueryBuilder('p')
            ->innerJoin('p.race', 'r')
            ->andWhere('r.isWerewolf = true')
            ->getQuery()
            ->getResult();
    }

    public function allByUserWithLetters($user_id)
    {
        return $this->createQueryBuilder('p')
            ->addSelect('COUNT(l.id) as totale')
            ->andWhere('p.user = :user_id')
            ->setParameter('user_id', $user_id)
            ->leftJoin('GdrGameBundle:Letter', 'l', 'WITH', 'l.receiver = p.id AND l.isRead = false')
            ->getQuery()
            ->getResult();
    }

    public function getKillableRandomly(\DateTime $minLastActivity)
    {
        $limitDeathTime = new \DateTime("- 3 month");

        return $this->createQueryBuilder('p')
            ->innerJoin('p.race', 'r')
            ->innerJoin('p.online', 'o')
            ->andWhere('r.isKillableRandomly = true')
            ->andWhere('p.isDead = false')
            ->andWhere('p.isSpecialDeath = false')
            ->andWhere('o.lastActivity >= :minTime')
            ->setParameter('minTime', $minLastActivity)
            ->andWhere('p.lastDeadAt <= :limitDeathTime OR p.lastDeadAt is NULL')
            ->setParameter('limitDeathTime', $limitDeathTime)
            ->getQuery()
            ->getArrayResult();
    }

    public function getPlayersWithRaceLevel(){
        return $this->createQueryBuilder('p')
            ->andWhere('p.raceLevel >= 1')
            ->getQuery()
            ->getResult();
    }
}
