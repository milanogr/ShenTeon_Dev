<?php

namespace Gdr\GameBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Gdr\GameBundle\Entity\TransactionType;

class LoadTransactionTypes extends AbstractFixture implements OrderedFixtureInterface {

    /**
     * @param ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $transfer = new TransactionType();
        $transfer->setName('Trasferimento');

        $credit = new TransactionType();
        $credit->setName('Accredito');

        $market = new TransactionType();
        $market->setName('Mercato');

        $deposito = new TransactionType();
        $deposito->setName('Deposito');

        $prelievo = new TransactionType();
        $prelievo->setName('Prelievo');

        $passa = new TransactionType();
        $passa->setName('Passaggio');

        $manager->persist($transfer);
        $manager->persist($credit);
        $manager->persist($market);
        $manager->persist($deposito);
        $manager->persist($prelievo);
        $manager->persist($passa);
        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    function getOrder()
    {
        return 20;
    }
}