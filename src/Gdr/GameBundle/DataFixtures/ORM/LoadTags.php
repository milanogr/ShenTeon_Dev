<?php

namespace Gdr\GameBundle\DataFixtures;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Gdr\GameBundle\Entity\TagChat;

class LoadTags extends AbstractFixture implements OrderedFixtureInterface{

    /**
     * @param ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $tag = new TagChat();
        $tag->setName('Bancone');
        $tag->setLocation($this->getReference('location-chat'));

        $tag2 = new TagChat();
        $tag2->setName('Cucina');
        $tag2->setLocation($this->getReference('location-chat'));

        $manager->persist($tag);
        $manager->persist($tag2);
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