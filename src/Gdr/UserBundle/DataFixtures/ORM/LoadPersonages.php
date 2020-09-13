<?php
namespace Gdr\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Gdr\UserBundle\Entity\Personage;

class LoadPersonages extends AbstractFixture implements OrderedFixtureInterface{

    /**
     * @param ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $airon = new Personage();
        $airon->setName('Airon');
        //$airon->setSurname('Vancroid');
        $airon->setUser($this->getReference('user-admin'));
        $airon->setRace($this->getReference('race-umano-pellechiara'));
        $airon->setBankAmount(10000);

        $lafrast = new Personage();
        $lafrast->setName('Lafrast');
        //$lafrast->setSurname('Cognome');
        $lafrast->setUser($this->getReference('user-morris'));
        $lafrast->setRace($this->getReference('race-umano-pellechiara'));
        $lafrast->setBankAmount(10000);

        $narcisse = new Personage();
        $narcisse->setName('Narcisse');
        //$narcisse->setSurname('Cognome');
        $narcisse->setUser($this->getReference('user-vale'));
        $narcisse->setRace($this->getReference('race-umano-pellechiara'));
        $narcisse->setBankAmount(10000);

        $user = new Personage();
        $user->setName('User');
        $user->setUser($this->getReference('user-test'));
        $user->setRace($this->getReference('race-umano-pellechiara'));
        $user->setBankAmount(5000);

        $manager->persist($airon);
        $manager->persist($lafrast);
        $manager->persist($narcisse);
        $manager->persist($user);
        $manager->flush();

        $this->addReference('pg-airon', $airon);
        $this->addReference('pg-lafrast', $lafrast);
        $this->addReference('pg-narcisse', $narcisse);
        $this->addReference('pg-test', $user);
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    function getOrder()
    {
        return 3;
    }
}