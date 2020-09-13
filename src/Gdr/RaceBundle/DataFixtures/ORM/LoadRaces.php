<?php

namespace Gdr\RaceBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\Doctrine;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Gdr\RaceBundle\Entity\Race;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Gdr\UserBundle\Entity\Personage;

class LoadRaces extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface {

    /**
     * @param ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $race = new Race();
        $race->setName('Umani Pellechiara');
        $race->setDescription('Gli umani dalla pelle chiara.');
        $race->setAgeMin(16);
        $race->setAgeMax(85);
        $race->setAgeDeath(95);
        $race->setMinHeight(150);
        $race->setMaxHeight(195);
        $race->setMinWeight(40);
        $race->setMaxWeight(130);

        $manager->persist($race);
        $manager->flush();

        $this->addReference('race-umano-pellechiara', $race);
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    function getOrder()
    {
        return 2;
    }

    /**
     * Sets the Container.
     *
     * @param ContainerInterface|null $container A ContainerInterface instance or null
     *
     * @api
     */
    public function setContainer(ContainerInterface $container = null)
    {
        // TODO: Implement setContainer() method.
    }
}