<?php

namespace Gdr\ItemsBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Gdr\ItemsBundle\Entity\Item;

class LoadItems extends AbstractFixture implements OrderedFixtureInterface {

    /**
     * @param ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $invisibile = new Item();
        $invisibile->setName('In Mutande');
        $invisibile->setType($this->getReference('item-type-vestiti'));
        $invisibile->setImageName('item_di_gestione.jpg');
        $invisibile->setShortDescription('In Mutande');
        $invisibile->setLongDescription('In Mutande');
        $invisibile->setIsDestructible(false);
        $invisibile->setIsDress(true);

        $manager->persist($invisibile);
        $manager->flush();

        $this->addReference('item-mutande', $invisibile);
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    function getOrder()
    {
        return 8;
    }
}