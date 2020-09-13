<?php

namespace Gdr\ItemsBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Gdr\ItemsBundle\Entity\Market;

class LoadMarkets extends AbstractFixture implements OrderedFixtureInterface {

    /**
     * @param ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $emp = new Market();
        $emp->setName('Emporio');

        $black = new Market();
        $black->setName('Mercato Nero');
        $black->setStartLevel(1);

        $pot = new Market();
        $pot->setName('Mercato Pozioni');
        $pot->setStartLevel(1);

        $manager->persist($emp);
        $manager->persist($black);
        $manager->persist($pot);
        $manager->flush();

        $this->addReference('market-emporio', $emp);
        $this->addReference('market-nero', $black);
        $this->addReference('market-pozioni', $pot);
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    function getOrder()
    {
        return 6;
    }
}