<?php

namespace App\Tests\Integration;
use App\Controller\ResetSocialsController;
use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use PHPUnit\Framework\MockObject\Exception;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

class ResetSocialsTest extends WebTestCase
{


    private ResetSocialsController $resetSocialsController;
    private User $user;
    public function setUp(): void
    {
        parent::setUp();
        $this->resetSocialsController=new ResetSocialsController();
        $this->user = new User();
        $this->user->setEmail('test@example.com');
        $this->user->setFacebookId('12345');
        $this->user->setFacebookPicture('http://example.com/picture.jpg');
        $this->user->setFacebookExpirationTime('1694419711');
        $this->user->setLinkedinId('12345');
        $this->user->setLinkedinPicture('http://example.com/picture.jpg');
        $this->user->setLinkedinExpirationTime('1694419711');
        $this->user->setTwitterId('12345');
        $this->user->setTwitterPicture('http://example.com/picture.jpg');
        $this->user->setTwitterExpirationTime('1694419711');
    }

    /**
     * @throws Exception
     */
    public function testFacebookSocialShouldBeReset(){
        //setting the service for our test controller
        self::bootKernel();
        $container =  self::$kernel->getContainer();
        $manager = $container->get('doctrine.orm.entity_manager');
        $repository = $manager->getRepository(User::class);
        $manager->persist($this->user);
        $manager->flush();
        //filling in  the session
        $session = new Session();
        $session->set('user_email', 'test@example.com');
        $request = new Request();
        $request->setSession($session);
        $this->resetSocialsController->setContainer($container);
        $request->setSession($session);
        //call the function
        $response = $this->resetSocialsController->resetFacebook($repository, $manager, $request);
        //test the output
        $this->assertInstanceOf(Response::class, $response);
        $this->user = $repository->findOneBy(['email' => 'test@example.com']);
        $this->assertNull($this->user->getFacebookId());
        $this->assertEmpty($this->user->getFacebookPicture());
        $this->assertNull($this->user->getFacebookExpirationTime());
        //delete the mock data from database
        $manager->remove($this->user);
        $manager->flush();

    }

    public function testLinkedinSocialShouldBeReset(){
        //setting the service for our test controller
        self::bootKernel();
        $container =  self::$kernel->getContainer();
        $manager = $container->get('doctrine.orm.entity_manager');
        $repository = $manager->getRepository(User::class);
        $manager->persist($this->user);
        $manager->flush();
        //filling in  the session
        $session = new Session();
        $session->set('user_email', 'test@example.com');
        $request = new Request();
        $request->setSession($session);
        $this->resetSocialsController->setContainer($container);
        $request->setSession($session);
        //call the function
        $response = $this->resetSocialsController->resetLinkedin($repository, $manager, $request);
        //test the output
        $this->assertInstanceOf(Response::class, $response);
        $this->user = $repository->findOneBy(['email' => 'test@example.com']);
        $this->assertNull($this->user->getLinkedinId());
        $this->assertEmpty($this->user->getLinkedinPicture());
        $this->assertNull($this->user->getLinkedinExpirationTime());
        //delete the mock data from database
        $manager->remove($this->user);
        $manager->flush();

    }


    public function testTwitterSocialShouldBeReset(){
        //setting the service for our test controller
        self::bootKernel();
        $container =  self::$kernel->getContainer();
        $manager = $container->get('doctrine.orm.entity_manager');
        $repository = $manager->getRepository(User::class);
        $manager->persist($this->user);
        $manager->flush();
        //filling in  the session
        $session = new Session();
        $session->set('user_email', 'test@example.com');
        $request = new Request();
        $request->setSession($session);
        $this->resetSocialsController->setContainer($container);
        $request->setSession($session);
        //call the function
        $response = $this->resetSocialsController->resetTwitter($repository, $manager, $request);
        //test the output
        $this->assertInstanceOf(Response::class, $response);
        $this->user = $repository->findOneBy(['email' => 'test@example.com']);
        $this->assertNull($this->user->getTwitterId());
        $this->assertEmpty($this->user->getTwitterPicture());
        $this->assertNull($this->user->getTwitterExpirationTime());
        //delete the mock data from database
        $manager->remove($this->user);
        $manager->flush();

    }


}