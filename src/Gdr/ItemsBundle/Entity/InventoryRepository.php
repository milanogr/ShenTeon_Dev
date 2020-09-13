<?php

namespace Gdr\ItemsBundle\Entity;

use Gdr\GameBundle\Entity\Location;
use JMS\DiExtraBundle\Annotation as DI;
use Doctrine\ORM\EntityNotFoundException;
use Doctrine\ORM\EntityRepository;
use Metadata\ClassMetadata;
use Symfony\Component\Security\Core\SecurityContext;

/**
 * InventoryRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class InventoryRepository extends EntityRepository
{
    private $securityContext;

    /**
     * @DI\InjectParams({
     *     "securityContext" = @DI\Inject("security.context"),
     * })
     *
     */
    public function setSecurityContext(SecurityContext $securityContext)
    {
        $this->securityContext = $securityContext;
    }

    /**
     * @return \Symfony\Component\Security\Core\SecurityContext
     */
    public function getSecurityContext()
    {
        return $this->securityContext;
    }

    public function createBaseQuery($personage)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.personage = :personage')
            ->innerJoin('GdrItemsBundle:Item', 'it', 'WITH', 'it.id = i.item')
            ->groupBy('i.personage')
            ->setParameter('personage', $personage);
    }

    public function findItemsToRemoveOnNewPersonage($personage)
    {
        return $this->createQueryBuilder("it")
            ->innerJoin("it.item", "i")
            ->andWhere("it.personage = :personage")
            ->andWhere("i.name != :name")
            ->setParameter('personage', $personage)
            ->setParameter("name", "In Mutande")
            ->getQuery()->getResult();
    }

    public function findItemsToRemoveOnDeath($personage)
    {
        return $this->createQueryBuilder("it")
            ->innerJoin("it.item", "i")
            ->andWhere("it.personage = :personage")
            ->andWhere("i.removeOnDeath = :true")
            ->setParameter('personage', $personage)
            ->setParameter("true", true)
            ->getQuery()->getResult();
    }

    /**
     * @param $personage
     *
     * @return mixed
     * @throws \Doctrine\ORM\EntityNotFoundException
     */
    public function getMarketsLevel($personage)
    {
        $result = $this->createBaseQuery($personage)
            ->addSelect(
                'MAX(it.emporiumLevel) as maxEmporiumLevel, MAX(it.blackMarketLevel) as maxBlackMarketLevel, it.name as itemName,
                 MAX(it.potionMarketLevel) as maxPotionMarketLevel'
            )
            ->getQuery()
            ->getOneOrNullResult();

        // Non ho alcun oggetto nell'inventario, quindi restituisco zero.
        if (null === $result) {
            return array(
                'maxEmporiumLevel' => 0,
                'maxBlackMarketLevel' => 0,
                'maxPotionMarketLevel' => 0
            );
        } else {
            return $result;
        }
    }

    public function createBaseJoinQuery()
    {
        return $this->createQueryBuilder('i')
            ->innerJoin('GdrItemsBundle:Item', 'it', 'WITH', 'it.id = i.item')
            ->innerJoin('GdrItemsBundle:ItemType', 'itt', 'WITH', 'itt.id = it.type');
    }

    public function getPersonagesWithKey($location_id)
    {
        return $this->createQueryBuilder('i')
            ->select('i.id as id, p.name as pgName, p.id as pgId')
            ->innerJoin('GdrItemsBundle:Item', 'it', 'WITH', 'it.id = i.item')
            ->innerJoin('GdrUserBundle:Personage', 'p', 'WITH', 'p.id = i.personage')
            ->andWhere('it.canAccessLocation = :loc')
            ->setParameter('loc', $location_id)
            ->getQuery()
            ->getResult();
    }

    public function getKeysForLocation($location_id)
    {
        return $this->createQueryBuilder('i')
            ->innerJoin('GdrItemsBundle:Item', 'it', 'WITH', 'it.id = i.item')
            ->innerJoin('GdrUserBundle:Personage', 'p', 'WITH', 'p.id = i.personage')
            ->andWhere('it.canAccessLocation = :loc')
            ->setParameter('loc', $location_id)
            ->getQuery()
            ->getResult();
    }

    public function getKeysForPersonage($pg_id)
    {
        return $this->createQueryBuilder('i')
            ->innerJoin('GdrItemsBundle:Item', 'it', 'WITH', 'it.id = i.item')
            ->innerJoin('GdrGameBundle:Location', 'l', 'WITH', 'it.canAccessLocation = l.id')
            ->innerJoin('GdrUserBundle:Personage', 'p', 'WITH', 'p.id = i.personage')
            ->andWhere('it.canAccessLocation IS NOT NULL')
            ->andWhere('l.type = :loc_type')
            ->setParameter('loc_type', Location::TYPE_HOUSE)
            ->andWhere('i.personage = :pg')
            ->setParameter('pg', $pg_id)
            ->groupBy('it.id')
            ->getQuery()
            ->setFetchMode('Inventory', 'Item', 'EAGER')
            ->setFetchMode('Inventory', 'Location', 'EAGER')
            ->getResult();
    }

    public function getKeysForLocationAndPersonage($location_id, $pg_id, $keyToExclude = null)
    {
        $qb = $this->createQueryBuilder('i');

        if (null !== $keyToExclude) {
            $qb->andWhere('i.id != :key')
                ->setParameter('key', $keyToExclude);
        }

        return $qb->innerJoin('GdrItemsBundle:Item', 'it', 'WITH', 'it.id = i.item')
            ->innerJoin('GdrUserBundle:Personage', 'p', 'WITH', 'p.id = i.personage')
            ->andWhere('it.canAccessLocation = :loc AND i.personage = :pg')
            ->setParameter('loc', $location_id)
            ->setParameter('pg', $pg_id)
            ->getQuery()
            ->getResult();
    }


    public function getKeyForLocationAndPersonage($location_id, $pg_id)
    {
        return $this->createQueryBuilder('i')
            ->innerJoin('GdrItemsBundle:Item', 'it', 'WITH', 'it.id = i.item')
            ->innerJoin('GdrUserBundle:Personage', 'p', 'WITH', 'p.id = i.personage')
            ->andWhere('it.canAccessLocation = :loc AND i.personage = :pg')
            ->setParameter('loc', $location_id)
            ->setParameter('pg', $pg_id)
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function createBaseItemsQuery($personage_id, $can_view_invisible)
    {
        $query = $this->createBaseJoinQuery()
            ->addSelect('it.name AS itemName, it.weight AS itemWeight, it.shortDescription AS itemShortDescription')
            ->addSelect(
                'it.activeDescription AS itemActiveDescription, it.showActiveDescription AS itemShowActiveDescription,
                 it.expendableDescription AS itemExpendableDescription, it.showExpendableDescription AS itemShowExpendableDescription,
                 i.expireAt as inventoryExpireAt, it.id AS itemId, i.isInvisible AS inventoryIsInvisible, i.id AS inventoryId,
                 i.isEquipped AS inventoryIsEquipped, it.isResalable AS itemIsResalable, it.isDestructible AS itemIsDestructible,
                 i.isDressed AS inventoryIsDressed, itt.name AS categoryName, it.imageName as itemImageName, it.dressIconImageName as itemDressIconImageName,
                 it.isTransportable AS itemIsTransportable, it.price as itemPrice, it.isTransferable as itemIsTransferable'
            )
            ->andWhere('i.personage = :personage')
            ->setParameter('personage', $personage_id);

        // Se visualizzo l'avatar di un altro non vedo i suoi oggetti invisibili
        if (false === $can_view_invisible) {
            $query->andWhere('i.isInvisible = :isInvisible')
                ->setParameter('isInvisible', false);
        }

        return $query;
    }

    public function getQueryItemsByPersonageAndCategory($personage_id, $category, $can_view_invisible = true)
    {
        $query = $this->createBaseItemsQuery($personage_id, $can_view_invisible)
            ->andWhere('it.type = :category')
            ->setParameter('category', $category)
            ->addOrderBy('it.name', 'DESC');

        return $query->getQuery();
    }

    public function getInBagItems($personage_id, $can_view_invisible = true)
    {
        $query = $this->createBaseItemsQuery($personage_id, $can_view_invisible)
            ->andWhere('i.isEquipped = :isEquipped')
            ->setParameter('isEquipped', true)
            ->addOrderBy('itt.name', 'DESC')
            ->addOrderBy('it.name', 'DESC');

        return $query->getQuery()->getResult();
    }

    public function findCategoriesForInventory($personage_id, $isOwner = false)
    {
        $qb = $this->createQueryBuilder('i')
            ->select('itt.id AS categoryId, itt.name AS categoryName, itt.imageName as categoryImage');

        if (false === $isOwner){
            $qb->innerJoin('GdrItemsBundle:Item', 'it', 'WITH', 'it.id = i.item AND i.isInvisible = false');
        }else{
            $qb->innerJoin('GdrItemsBundle:Item', 'it', 'WITH', 'it.id = i.item');
        }

        return $qb
            ->innerJoin('GdrItemsBundle:ItemType', 'itt', 'WITH', 'itt.id = it.type')
            ->andWhere('itt.name != :vestiti')
            ->setParameter('vestiti', ItemType::VESTITI)

            ->andWhere('i.personage = :personage')
            ->setParameter('personage', $personage_id)

            ->groupBy('itt.id')
            ->orderBy('categoryName')
            ->getQuery()
            ->getResult();
    }

    public function getTotalBagWeight($personage_id)
    {
        return $this->createBaseItemsQuery($personage_id, true)
            ->select('sum(it.weight) as totalWeight')
            ->andWhere('i.isEquipped = :isEquipped')
            ->setParameter('isEquipped', true)
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function findMutandeForPersonage($personage_id, $mutande)
    {
        return $this->createBaseItemsQuery($personage_id, true)
            ->andWhere('it.name = :mutande')
            ->setParameter('mutande', $mutande)
            ->setMaxResults(1)
            ->getQuery()
            ->getSingleResult();
    }

    public function findEquipForChat($pgName)
    {
        return $this->createBaseJoinQuery()
            ->innerJoin('GdrUserBundle:Personage', 'p', 'WITH', 'p.id = i.personage')
            ->addSelect('it.name AS itemName')
            ->andWhere('p.name = :personage')
            ->setParameter('personage', $pgName)
//            ->andWhere('i.isInvisible = :isInvisible')
//            ->setParameter('isInvisible', false)
            ->andWhere('i.isEquipped = :isEquipped')
            ->setParameter('isEquipped', true)
            ->andWhere('itt.showInChat = true')
            ->addOrderBy('it.name', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findItemsWithGrimory($pg_id)
    {
        return $this->createBaseJoinQuery()
            ->andWhere('it.grimoryLevel > :zero')
            ->setParameter('zero', 0)
            ->andWhere('i.personage = :personage')
            ->setParameter('personage', $pg_id)
            ->groupBy('it.grimoryLevel')
            ->orderBy('it.grimoryLevel', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function getExpiredItems()
    {
        return $this->createBaseJoinQuery()
            ->andWhere('i.expireAt <= :now')
            ->setParameter('now', new \DateTime())
            ->orderBy('i.personage')
            ->getQuery()
            ->setFetchMode('Inventory', 'personage', 3)
            ->setFetchMode('Inventory', 'item', 3)
            ->getResult();
    }

    public function deleteExpiredItems()
    {
        return $this->createBaseJoinQuery()
            ->delete()
            ->andWhere('i.expireAt <= :now')
            ->setParameter('now', new \DateTime())
            ->getQuery()
            ->execute();
    }


    public function getTransferableItemsForChat($pg_id)
    {
        $items = $this->createBaseItemsQuery($pg_id, true)
            ->select('it.name as name, i.id as id, itt.name as category')
            ->andWhere('i.isDressed = :false')
            ->andWhere('i.isEquipped = :true')
            ->andWhere('it.isTransferable = :true')
            ->setParameter('false', false)
            ->setParameter('true', true)
            ->setParameter('false', false)
            ->orderBy('itt.name', 'ASC')
            ->addOrderBy('it.name', 'ASC')
            ->groupBy('i.id')
            ->getQuery()
            ->getResult();

        $return = array(null => null);

        foreach ($items as $i) {
            // $return[$i['id']] = $i['name'];
            $return[$i['category']][$i['id']] = $i['name'];
        }

        return $return;
    }

    public function findInventoriesByIds($pg_id, $ids)
    {
        $qb = $this->createQueryBuilder('i');

        return $qb
            //->addSelect('it.weight as weight')
            ->innerJoin('GdrItemsBundle:Item', 'it', 'WITH', 'it.id = i.item')
            ->add('where', $qb->expr()->in('i.id', '?1'))
            ->andWhere('i.isDressed = :false')
            ->andWhere('i.isEquipped = :true')
            ->andWhere('it.isTransferable = :true')
            ->andWhere('i.personage = :personage')
            ->setParameters(
                array(
                    1 => $ids,
                    'false' => false,
                    'true' => true,
                    'personage' => $pg_id
                )
            )
            ->getQuery()
            ->getResult();
    }

    // ---------------- CAN -------------------

    public function canBaseQuery($personage_id)
    {
        return $this->createQueryBuilder('i')
            ->innerJoin('GdrItemsBundle:Item', 'it', 'WITH', 'it.id = i.item')
            ->andWhere('i.personage = :personage')
            ->setParameter('personage', $personage_id)
            ->groupBy('it.id');
    }

    public function canModerateChat($personage_id)
    {
        $query = $this->canBaseQuery($personage_id)
            ->andWhere('it.canModerateChat = :true')
            ->setParameter('true', true)
            ->getQuery()
            ->getResult();

        // FALSE se non ho l'oggetto oppure se non sono admin.
        if (null === $query || (count($query) == 0 && false === $this->getSecurityContext()->isGranted('ROLE_ADMIN'))) {
            return false;
        } else {
            return true;
        }
    }

    public function canModerateForum($personage_id)
    {
        $query = $this->canBaseQuery($personage_id)
            ->andWhere('it.canModerateForum = :true')
            ->setParameter('true', true)
            ->getQuery()
            ->getResult();

        // FALSE se non ho l'oggetto oppure se non sono admin.
        if (null === $query || (count($query) == 0 && false === $this->getSecurityContext()->isGranted('ROLE_ADMIN'))) {
            return false;
        } else {
            return true;
        }
    }

    public function canFate($personage_id)
    {
        $query = $this->canBaseQuery($personage_id)
            ->andWhere('it.canFate = :true')
            ->setParameter('true', true)
            ->getQuery()
            ->getResult();

        // FALSE se non ho l'oggetto oppure se non sono admin.
        if (null === $query || (count($query) == 0 && false === $this->getSecurityContext()->isGranted('ROLE_ADMIN'))) {
            return false;
        } else {
            return true;
        }
    }

    public function canAraldo($personage_id)
    {
        $query = $this->canBaseQuery($personage_id)
            ->andWhere('it.canAraldo = :true')
            ->setParameter('true', true)
            ->getQuery()
            ->getResult();

        // FALSE se non ho l'oggetto oppure se non sono admin.
        if (null === $query || (count($query) == 0 && false === $this->getSecurityContext()->isGranted('ROLE_ADMIN'))) {
            return false;
        } else {
            return true;
        }
    }

    public function canViewGrimory($personage_id, $level)
    {
        $query = $this->canBaseQuery($personage_id)
            ->andWhere('it.grimoryLevel = :level')
            ->setParameter('level', $level)
            ->getQuery()
            ->getResult();

        return null === $query || count($query) == 0 ? false : true;
    }

    public function canAccessLocation($personage_id, $location_id)
    {
        $query = $this->canBaseQuery($personage_id)
            ->andWhere('it.canAccessLocation = :loc')
            ->setParameter('loc', $location_id)
            ->getQuery()
            ->getResult();

        // FALSE se non ho l'oggetto oppure se non sono admin.
        if (null === $query || (count($query) == 0 && false === $this->getSecurityContext()->isGranted('ROLE_ADMIN'))) {
            return false;
        } else {
            return true;
        }
    }

    public function canMarry($personage_id)
    {
        $query = $this->canBaseQuery($personage_id)
            ->andWhere('it.canMarry = true')
            ->getQuery()
            ->getResult();

        // FALSE se non ho l'oggetto oppure se non sono admin.
        if (null === $query || (count($query) == 0 && false === $this->getSecurityContext()->isGranted('ROLE_ADMIN'))) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * @param $personage_id
     *
     * Somma di "addMana" dei miei oggetti.
     *
     * @return mixed
     */
    public function getMaxMana($personage_id)
    {
        $books = $this->createQueryBuilder('i')
            ->select('it.addMana AS mana')
            ->innerJoin('GdrItemsBundle:Item', 'it', 'WITH', 'it.id = i.item')
            ->andWhere('i.personage = :personage')
            ->setParameter('personage', $personage_id)
            ->andWhere('it.addMana > 0')
            ->groupBy('it.id')
            ->getQuery()
            ->getResult();

        $totale = 0;

        foreach ($books as $book) {
            $totale += $book['mana'];
        }

        return $totale;
    }

    public function getDressedItem($personage_id)
    {
        return $this->createQueryBuilder('i')
            ->select('it.name as name')
            ->innerJoin('i.item', 'it')
            ->andWhere('i.isDressed = true')
            ->andWhere('i.isEquipped = true')
            ->andWhere('i.personage = :pg')
            ->setParameter('pg', $personage_id)
            ->setMaxResults(1)
            ->getQuery()
            ->getSingleScalarResult();
    }
}
