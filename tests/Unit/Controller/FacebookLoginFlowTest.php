<?php

namespace App\Tests\Unit\Controller;

use App\Controller\FacebookCallbackController;
use App\Controller\FacebookLoginController;
use App\Entity\User;
use App\Repository\UserRepository;
use BadMethodCallException;
use Doctrine\ORM\EntityManagerInterface;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use Monolog\Test\TestCase;
use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\MockObject\MockObject;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class FacebookLoginFlowTest extends WebTestCase
{
    private FacebookCallbackController $callbackController;
    private FacebookLoginController $loginController;
    private MockObject $userDb;
    private MockObject $manager;
    private MockObject $request;

    /**
     * @throws Exception
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->callbackController=new FacebookCallbackController();
        $this->loginController=new FacebookLoginController();
        $this->authorizationUrl='';


    }
    /**
     *  checks if connecting to facebook account is correctly authorized
    */
    public function testAuthorizationShouldWork(){
        self::bootKernel();
        $container =  self::$kernel->getContainer();
        $manager = $container->get('doctrine.orm.entity_manager');
        $repository = $manager->getRepository(User::class);
        $response=$this->loginController->index();
        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertStringStartsWith('https://www.facebook.com/v15.0/dialog/oauth', $response->getTargetUrl());
    }

    /**
     * checks if authentication with facebook is successful
    */
    public function testAuthenticationShouldWork(){
        $client = static::createClient();
        self::bootKernel();
        $container = self::$kernel->getContainer();
        $manager=$container->get('doctrine.orm.entity_manager');
        $repository = $manager->getRepository(User::class);
        //get the authorization code
        //set dummy user
        $user = new User();
        $user->setEmail('test@example.com');
        $manager->persist($user);
        $manager->flush();
        //set dummy session
        $session = new Session();
        $session->set('user_email', 'test@example.com');
        $request = new Request();
        $request->setSession($session);
        $this->callbackController->setContainer($container);
        //call function
        $response = $this->callbackController->index($repository, $manager, $request);
        //test output
        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertEquals('/socialmedia',$response->getTargetUrl());
        $user = $repository->findOneBy(['email' => 'test@example.com']);
        $manager->remove($user);
        $manager->flush();



    }

}