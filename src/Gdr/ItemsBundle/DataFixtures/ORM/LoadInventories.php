<?php

namespace Gdr\ItemsBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Gdr\ItemsBundle\Entity\Inventory;

class LoadInventories extends AbstractFixture implements OrderedFixtureInterface {

    /**
     * @param ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $invisibile = new Inventory();
        $invisibile->setItem($this->getReference('item-mutande'));
        $invisibile->setPersonage($this->getReference('pg-airon'));
        $invisibile->setIsDressed(true);
        $invisibile->setIsEquipped(true);

        $invisibileMorris = new Inventory();
        $invisibileMorris->setItem($this->getReference('item-mutande'));
        $invisibileMorris->setPersonage($this->getReference('pg-lafrast'));
        $invisibileMorris->setIsDressed(true);
        $invisibileMorris->setIsEquipped(true);

        $invisibileNarcisse = new Inventory();
        $invisibileNarcisse->setItem($this->getReference('item-mutande'));
        $invisibileNarcisse->setPersonage($this->getReference('pg-narcisse'));
        $invisibileNarcisse->setIsDressed(true);
        $invisibileNarcisse->setIsEquipped(true);

        $invisibileUser = new Inventory();
        $invisibileUser->setItem($this->getReference('item-mutande'));
        $invisibileUser->setPersonage($this->getReference('pg-test'));
        $invisibileUser->setIsDressed(true);
        $invisibileUser->setIsEquipped(true);

        $manager->persist($invisibile);
        $manager->persist($invisibileMorris);
        $manager->persist($invisibileNarcisse);
        $manager->persist($invisibileUser);
        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    function getOrder()
    {
        return 9;
    }
}