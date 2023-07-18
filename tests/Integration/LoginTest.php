<?php

namespace App\Tests\Integration;

use Monolog\Test\TestCase;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class LoginTest extends WebTestCase
{
    public function testUserShouldLogin()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/login');
        $form = $crawler->selectButton('sign in')->form([
            'email' => 'dummyUser1@gmail.com',
            'password' => '1234',
        ]);
        $client->submit($form);
        // Check that the response is a redirect to the socialmedia page
        $response = $client->getResponse();
        $this->assertTrue($response->isRedirect('/socialmedia'));

    }

    public function testUserShouldNOTLoginWrongPassword()
    {
        //user should not be allowed to login because of an incorrect password
        $client = static::createClient();
        $crawler = $client->request('GET', '/login');
        $form = $crawler->selectButton('sign in')->form([
            'email' => 'dummyUser1@gmail.com',
            'password' => '123456',
        ]);
        $client->submit($form);
        // Check that the response is a redirect to the socialmedia page
        $response = $client->getResponse();
        $this->assertFalse($response->isRedirect('/socialmedia'));

    }

    public function testUserShouldNOTLoginWrongEmail()
    {
        //user should not be allowed to login because of an incorrect email
        $client = static::createClient();
        $crawler = $client->request('GET', '/login');
        $form = $crawler->selectButton('sign in')->form([
            'email' => 'inexistantemail@gmail.com',
            'password' => '123456',
        ]);
        $client->submit($form);
        // Check that the response is a redirect to the socialmedia page
        $response = $client->getResponse();
        $this->assertFalse($response->isRedirect('/socialmedia'));

    }

}