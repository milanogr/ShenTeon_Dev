<?php

namespace Gdr\GameBundle\Service;

use Doctrine\Bundle\DoctrineBundle\Registry;
use Doctrine\ORM\EntityNotFoundException;
use Gdr\GameBundle\Entity\Location;
use Gdr\GameBundle\Entity\Transaction;
use Gdr\GameBundle\Entity\TransactionType;
use Gdr\ItemsBundle\Entity\Item;
use Gdr\ItemsBundle\Entity\Property;
use Gdr\UserBundle\Entity\Personage;
use JMS\DiExtraBundle\Annotation\Inject;
use JMS\DiExtraBundle\Annotation\InjectParams;
use JMS\DiExtraBundle\Annotation\Service;
use JMS\DiExtraBundle\Annotation as DI;
use Symfony\Component\Debug\Exception\FatalErrorException;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class Erario
 *
 * Contiene metodi condivisi per l'erario e la proprietà.
 *
 * @DI\Service("gdr.erario", public=true)
 */
class Erario
{
    /**
     * @Inject("doctrine.orm.entity_manager")
     * @var \Doctrine\ORM\EntityManager
     */
    public $em;

    /**
     * @Inject("gdr.game_bundle.general")
     * @var \Gdr\GameBundle\General
     */
    public $general;

    public function sellProperty(Personage $personage, Property $property, $checkIfMine = true)
    {

        if (true === $checkIfMine) {
            $this->checkIfMine($property);
            $personage = $this->general->getPersonage();
        }

        $totalAmount = ceil($property->getPrice() / 2);

        $transaction = new Transaction();
        $transaction->setAmount($totalAmount);
        $transaction->setIsPlus(true);
        $transaction->setSubject($personage);
        $transactionType = $this->em->getRepository('GdrGameBundle:TransactionType')
            ->find(TransactionType::MARKET);
        $transaction->setType($transactionType);
        $transaction->setNote("Avete venduto {$property->getName()} all'Erario.");

        $personage->setBankAmount($personage->getBankAmount() + $totalAmount);

        $property->setOwner(null);
        $property->setNextProductionAt(null);
        $property->setNextTaxAt(null);

        $this->em->persist($transaction);
        $this->em->persist($personage);
        $this->em->persist($property);
        $this->em->flush();

        $this->removeKeysForProperty($property);
    }

    public function createChatForProperty(Property $property)
    {
        $exist = $this->em->getRepository("GdrGameBundle:Location")
            ->findOneBy(array("property" => $property));

        if (null === $exist) {
            $location = new Location();
            $location->setName($property->getName());
            $location->setType(Location::TYPE_HOUSE);
            $location->setDescription($property->getDescription());
            $location->setProperty($property);
            $location->setRequireKey(true);

            $this->em->persist($location);
            $this->em->flush();

            $exist = $location;
        }

        return $exist;
    }

    public function removeChatForProperty(Property $property)
    {
        $exist = $this->em->getRepository("GdrGameBundle:Location")
            ->findOneBy(array("property" => $property));

        if (null !== $exist) {
            $this->em->remove($exist);
            $this->em->flush();
        }
    }

    public function createKeysForProperty(Property $property)
    {
        // Recupero la chat. Se non esiste, la creo.
        $location = $this->em->getRepository("GdrGameBundle:Location")
            ->findOneBy(array("property" => $property));

        if (null === $location){
            $location = $this->createChatForProperty($property);
        }

        // Quante chiavi ci sono già in giro? Faccio meno il massimo.
        // Creo le chiavi e le metto nell'inventario.
        $alreadyCreated = $this->em->getRepository('GdrItemsBundle:Inventory')
            ->getKeysForLocation($location);

        $totalCreated = $alreadyCreated === null ? 0 : count($alreadyCreated);

        if ($totalCreated >= $property->getMaxPeople()) {
            return new JsonResponse(array(
                'response' => false,
                'msg' => 'Hai già creato tutte le chiavi disponibili per questo immobile.'
            ));
        }

        $diff = $property->getMaxPeople() - $totalCreated;

        // Se ho già un oggetto creato lo recupero, altrimenti lo creo da zero.
        $item = $this->em->getRepository('GdrItemsBundle:Item')
            ->findOneBy(
                array(
                    'canAccessLocation' => $location
                )
            );

        if (null === $item) {

            $itType = $this->em->getRepository('GdrItemsBundle:ItemType')
                ->findOneBy(array("name" => "Chiavi d'Accesso"));

            $item = new Item();
            $item->setImageName('524732fe82f29.jpeg');
            $item->setName("Chiave per {$property->getName()}");
            $item->setShortDescription("Chiave che permette l'accesso a {$property->getName()}.");
            $item->setIsDestructible(true);
            $item->setIsTransferable(true);
            $item->setIsTransportable(true);
            $item->setCanAccessLocation($location);
            $item->setType($itType);

            $this->em->persist($item);
            $this->em->flush();
        }

        $this->general->itemsToInventory($diff, $this->general->getPersonage(), $item);

        return new JsonResponse(array(
            'response' => true,
            'msg' => 'Le chiavi ora sono disponibili nel tuo inventario.'
        ));
    }

    public function removeKeysForProperty(Property $property)
    {
        $location = $this->em->getRepository("GdrGameBundle:Location")
            ->findOneBy(array("property" => $property));

        $keys = $this->em->getRepository('GdrItemsBundle:Inventory')
            ->getKeysForLocation($location->getId());

        foreach ($keys as $key) {

            if ($key->getPersonage() != $this->general->getPersonage()) {
                $msg = "<p>Ti notifichiamo che il proprietario dell'immobile {$property->getName(
                )} ha rimosso dal tuo inventario la relativa chiave d'accesso.</p>";
                $sl = $this->general->createSystemLetter($msg, $key->getPersonage()->getId(), "Gestione");
            }

            $this->em->remove($key);
        }

        $this->em->flush();
    }

    public function removeKeyForPropertyByPersonage(Property $property, Personage $personage)
    {
        $location = $this->em->getRepository("GdrGameBundle:Location")
            ->findOneBy(array("property" => $property));

        $keys = $this->em->getRepository('GdrItemsBundle:Inventory')
            ->getKeysForLocationAndPersonage($location->getId(), $personage->getId());

        foreach ($keys as $key) {

            $this->em->remove($key);

        }

        $this->em->flush();

        $msg = "<p>Ti notifichiamo che il proprietario dell'immobile {$property->getName(
        )} ha rimosso dal tuo inventario la relativa chiave d'accesso.</p>";
        $sl = $this->general->createSystemLetter($msg, $key->getPersonage()->getId(), "Gestione");

        return new JsonResponse(array(
            'response' => true,
            'msg' => 'Le chiave è stata rimossa'
        ));
    }

    /**
     * Controlla che l'id della proprietà passata appartenga a me.
     *
     * @param Property $property
     *
     * @return bool
     * @throws \Doctrine\ORM\EntityNotFoundException
     */
    public function checkIfMine(Property $property)
    {
        $isMine = $this->general->getPersonage() == $property->getOwner();

        if (false === $isMine) {
            throw new EntityNotFoundException();
        }

        return $isMine;
    }
}