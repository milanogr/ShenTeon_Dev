<?php

namespace Gdr\GameBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Gdr\GameBundle\Entity\Location;

class LoadLocations extends AbstractFixture implements OrderedFixtureInterface {

    /**
     * @param ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $chat = new Location();
        $chat->setName('Locanda del Cervo Rosso');

        $mappa = new Location();
        $mappa->setName('Teon');
        $mappa->setType($mappa::TYPE_MAP);

        $manager->persist($chat);
        $manager->persist($mappa);
        $manager->flush();

        $this->addReference('location-chat', $chat);
        $this->addReference('location-mappa', $mappa);
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