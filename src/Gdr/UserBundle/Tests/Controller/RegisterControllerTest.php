<?php

namespace Gdr\UserBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RegisterControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/registrati');
        $this->assertTrue($client->getResponse()->isSuccessful());

        $container = self::$kernel->getContainer();
        $em = $container->get('doctrine');
        $userRepo = $em->getRepository('GdrUserBundle:User');
        $userRepo->createQueryBuilder('u')
            ->delete()
            ->getQuery()
            ->execute()
        ;

        $form = $crawler->selectButton('Registrati')->form();
        $form['user_register[username]'] = 'demo';
        $form['user_register[email]'] = 'user5@user.com';
        $form['user_register[plainPassword][first]'] = 'demo';
        $form['user_register[plainPassword][second]'] = 'demo';

        $client->submit($form);

        $this->assertTrue($client->getResponse()->isRedirect());
        $client->followRedirect();
        $this->assertTrue($client->getResponse()->isSuccessful());
    }
}
