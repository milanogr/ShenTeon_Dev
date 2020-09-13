<?php

namespace Gdr\ItemsBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\Doctrine;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Gdr\ItemsBundle\Entity\ItemType;
use Gdr\ItemsBundle\Entity\MarketType;
use Gdr\RaceBundle\Entity\Race;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Gdr\UserBundle\Entity\Personage;

class LoadItemsType extends AbstractFixture implements OrderedFixtureInterface {

    /**
     * @param ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $ali = new ItemType();
        $ali->setName('Alimentari');
        $ali->addMarket($this->getReference('market-emporio'));
        $manager->persist($ali);

        $armat = new ItemType();
        $armat->setName('Armature');
        $armat->addMarket($this->getReference('market-emporio'));
        $manager->persist($armat);

        $armi = new ItemType();
        $armi->setName('Armi');
        $armi->addMarket($this->getReference('market-emporio'));
        $armi->addMarket($this->getReference('market-nero'));
        $manager->persist($armi);

        $arred = new ItemType();
        $arred->setName('Arredamento');
        $arred->addMarket($this->getReference('market-emporio'));
        $manager->persist($arred);

        $fume = new ItemType();
        $fume->setName('Fumeria');
        $fume->addMarket($this->getReference('market-emporio'));
        $fume->addMarket($this->getReference('market-nero'));
        $manager->persist($fume);

        $gioie = new ItemType();
        $gioie->setName('Gioielleria');
        $gioie->addMarket($this->getReference('market-emporio'));
        $manager->persist($gioie);

        $libri = new ItemType();
        $libri->setName('Libri');
        $libri->addMarket($this->getReference('market-emporio'));
        $libri->addMarket($this->getReference('market-nero'));
        $manager->persist($libri);

        $pozioni = new ItemType();
        $pozioni->setName('Pozioni');
        $pozioni->addMarket($this->getReference('market-emporio'));
        $pozioni->addMarket($this->getReference('market-nero'));
        $manager->persist($pozioni);

        $utensili = new ItemType();
        $utensili->setName('Utensili');
        $utensili->addMarket($this->getReference('market-emporio'));
        $manager->persist($utensili);

        $vestiti = new ItemType();
        $vestiti->setName('Vestiti');
        $vestiti->addMarket($this->getReference('market-emporio'));
        $vestiti->addMarket($this->getReference('market-nero'));
        $manager->persist($vestiti);

        $vivaio = new ItemType();
        $vivaio->setName('Vivaio');
        $vivaio->addMarket($this->getReference('market-emporio'));
        $vivaio->addMarket($this->getReference('market-nero'));
        $manager->persist($vivaio);

        $accessori = new ItemType();
        $accessori->setName('Accessori');
        $accessori->addMarket($this->getReference('market-nero'));
        $manager->persist($accessori);

        $droghe = new ItemType();
        $droghe->setName('Droghe');
        $droghe->addMarket($this->getReference('market-nero'));
        $manager->persist($droghe);

        $ingrCompleti = new ItemType();
        $ingrCompleti->setName('Ingredienti per ricette complete');
        $ingrCompleti->addMarket($this->getReference('market-pozioni'));
        $manager->persist($ingrCompleti);

        $ingrSfusi = new ItemType();
        $ingrSfusi->setName('Ingredienti sfusi');
        $ingrSfusi->addMarket($this->getReference('market-pozioni'));
        $manager->persist($ingrSfusi);

        $accPozio = new ItemType();
        $accPozio->setName('Accessori per pozionisti');
        $accPozio->addMarket($this->getReference('market-pozioni'));
        $manager->persist($accPozio);

        $manager->flush();

        $this->addReference('item-type-vestiti', $vestiti);
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    function getOrder()
    {
        return 7;
    }
}