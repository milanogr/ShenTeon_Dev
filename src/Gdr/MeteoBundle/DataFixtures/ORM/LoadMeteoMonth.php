<?php

namespace Gdr\MeteoBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Gdr\MeteoBundle\Entity\MeteoMonth;

class MeteoMonthInventories extends AbstractFixture implements OrderedFixtureInterface {

    /**
     * @param ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $m01 = new MeteoMonth();
        $m01->setName("Gennaio");
        $m01->setTempMin("-10");
        $m01->setTempMax("1");
        $m01->setMonthIndex(1);

        $m02 = new MeteoMonth();
        $m02->setName("Febbraio");
        $m02->setTempMin("-10");
        $m02->setTempMax("1");
        $m02->setMonthIndex(2);

        $m03 = new MeteoMonth();
        $m03->setName("Marzo");
        $m03->setTempMin("-10");
        $m03->setTempMax("1");
        $m03->setMonthIndex(3);

        $m04 = new MeteoMonth();
        $m04->setName("Aprile");
        $m04->setTempMin("-10");
        $m04->setTempMax("1");
        $m04->setMonthIndex(4);

        $m05 = new MeteoMonth();
        $m05->setName("Maggio");
        $m05->setTempMin("-10");
        $m05->setTempMax("1");
        $m05->setMonthIndex(5);

        $m06 = new MeteoMonth();
        $m06->setName("Giugno");
        $m06->setTempMin("-10");
        $m06->setTempMax("1");
        $m06->setMonthIndex(6);

        $m07 = new MeteoMonth();
        $m07->setName("Luglio");
        $m07->setTempMin("-10");
        $m07->setTempMax("1");
        $m07->setMonthIndex(7);

        $m08 = new MeteoMonth();
        $m08->setName("Agosto");
        $m08->setTempMin("-10");
        $m08->setTempMax("1");
        $m08->setMonthIndex(8);

        $m09 = new MeteoMonth();
        $m09->setName("Settembre");
        $m09->setTempMin("-10");
        $m09->setTempMax("1");
        $m09->setMonthIndex(9);

        $m10 = new MeteoMonth();
        $m10->setName("Ottobre");
        $m10->setTempMin("-10");
        $m10->setTempMax("1");
        $m10->setMonthIndex(10);

        $m11 = new MeteoMonth();
        $m11->setName("Novembre");
        $m11->setTempMin("-10");
        $m11->setTempMax("1");
        $m11->setMonthIndex(11);

        $m12 = new MeteoMonth();
        $m12->setName("Dicembre");
        $m12->setTempMin("-10");
        $m12->setTempMax("1");
        $m12->setMonthIndex(12);

        $manager->persist($m01);
        $manager->persist($m02);
        $manager->persist($m03);
        $manager->persist($m04);
        $manager->persist($m05);
        $manager->persist($m06);
        $manager->persist($m07);
        $manager->persist($m08);
        $manager->persist($m09);
        $manager->persist($m10);
        $manager->persist($m11);
        $manager->persist($m12);
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