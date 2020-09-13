<?php

namespace Gdr\MeteoBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Gdr\MeteoBundle\Entity\MeteoWind;

class MeteoWindInventories extends AbstractFixture implements OrderedFixtureInterface {

    /**
     * @param ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $w01 = new MeteoWind();
        $w01->setName("Vento Assente");
        $w01->setIsRandom(true);

        $w02 = new MeteoWind();
        $w02->setName("Vento Debole");
        $w02->setIsRandom(true);

        $w03 = new MeteoWind();
        $w03->setName("Vento Sostenuto");
        $w03->setIsRandom(true);

        $w04 = new MeteoWind();
        $w04->setName("Vento Forte");
        $w04->setIsRandom(true);

        $w05 = new MeteoWind();
        $w05->setName("Vento Molto Forte");
        $w05->setIsRandom(true);

        $w06 = new MeteoWind();
        $w06->setName("Vento di Burrasca");
        $w06->setIsRandom(true);

        $w07 = new MeteoWind();
        $w07->setName("Ciclone");
        $w07->setIsRandom(false);

        $manager->persist($w01);
        $manager->persist($w02);
        $manager->persist($w03);
        $manager->persist($w04);
        $manager->persist($w05);
        $manager->persist($w06);
        $manager->persist($w07);

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