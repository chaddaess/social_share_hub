<?php
namespace App\Tests\Integration;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\UserRepository;

class RegistrationTest extends WebTestCase
{
    public function testUserShouldBeRegistered()
    {
        $client = static::createClient();
        // Submit the registration form with valid data
        $crawler = $client->request('GET', '/register');
        $form = $crawler->selectButton('sign up')->form([
        'registration_form[email]' => 'test@test.com',
        'registration_form[plainPassword]' => 'password123',
        'registration_form[agreeTerms]' => true
        ]);
        $client->submit($form);
        // Check that the response is a redirect to the login page
        $response = $client->getResponse();
        $this->assertTrue($response->isRedirect('/login'));
        // Check that a new user was added to the database
        $entityManager = self::$kernel->getContainer()->get('doctrine.orm.entity_manager');
        $user = $entityManager->getRepository(User::class)->findOneBy([
            'email' => 'test@test.com'
        ]);
        $this->assertNotNull($user);
        $entityManager->remove($user);
        $entityManager->flush();
    }

    public function testUserShouldNOTBeRegistered()
    {
        //user should NOT be registered if they don't accept terms
        $client = static::createClient();
        // Submit the registration form with valid data
        $crawler = $client->request('GET', '/register');
        $form = $crawler->selectButton('sign up')->form([
            'registration_form[email]' => 'test@test.com',
            'registration_form[plainPassword]' => 'password123',
            'registration_form[agreeTerms]' => false
        ]);
        $client->submit($form);
        // Check that the response is a redirect to the login page
        $response = $client->getResponse();
        $this->assertFalse($response->isRedirect('/login'));
        // Check that a new user was added to the database
        $entityManager = self::$kernel->getContainer()->get('doctrine.orm.entity_manager');
        $user = $entityManager->getRepository(User::class)->findOneBy([
            'email' => 'test@test.com'
        ]);
        $this->assertNull($user);
    }




}
