<?php
namespace Gdr\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Gdr\UserBundle\Entity\User;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class LoadUsers extends AbstractFixture implements FixtureInterface, ContainerAwareInterface, OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $admin = new User();
        $admin->setPassword($this->encodePassword($admin, 'admin'));
        $admin->setRoles(array('ROLE_ADMIN'));
        $admin->setIsActive(true);
        $admin->setEmail('admin@admin.com');
        $manager->persist($admin);

        $vale = new User();
        $vale->setPassword($this->encodePassword($vale, 'test'));
        $vale->setRoles(array('ROLE_ADMIN'));
        $vale->setIsActive(true);
        $vale->setEmail('valexx84@hotmail.it');
        $manager->persist($vale);

        $morris = new User();
        $morris->setPassword($this->encodePassword($morris, 'test'));
        $morris->setRoles(array('ROLE_ADMIN'));
        $morris->setIsActive(true);
        $morris->setEmail('mcstarfall@msn.com');
        $manager->persist($morris);

        $user = new User();
        $user->setPassword($this->encodePassword($user, 'test'));
        $user->setRoles(array('ROLE_USER'));
        $user->setIsActive(true);
        $user->setEmail('test@test.it');
        $manager->persist($user);


        $manager->flush();

        $this->addReference('user-admin', $admin);
        $this->addReference('user-morris', $morris);
        $this->addReference('user-vale', $vale);
        $this->addReference('user-test', $user);
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
        $this->container = $container;
    }

    private function encodePassword($user, $plainPassword)
    {
        $encoder = $this->container->get('security.encoder_factory')
            ->getEncoder($user)
        ;

        return $encoder->encodePassword($plainPassword, $user->getSalt());
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    function getOrder()
    {
        return 1;
    }
}