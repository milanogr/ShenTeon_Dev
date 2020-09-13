<?php

namespace Gdr\UserBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class LoginControllerTest extends WebTestCase
{
    public function testLogin()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/login');
        $this->assertTrue($client->getResponse()->isSuccessful());

        $form = $crawler->selectButton('type="submit"')->form();
        $form['_username'] = 'demo';
        $form['_password'] = 'demo';

        $client->submit($form);

        $this->assertTrue($client->getResponse()->isRedirect());
        $client->followRedirect();
        $this->assertTrue($client->getResponse()->isSuccessful());
    }
}
