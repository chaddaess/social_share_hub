<?php

namespace App\Tests\Unit\Controller;

use App\Controller\FacebookCallbackController;
use App\Repository\UserRepository;
use BadMethodCallException;
use Doctrine\ORM\EntityManagerInterface;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use Monolog\Test\TestCase;
use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\MockObject\MockObject;
use Symfony\Component\HttpFoundation\Request;

class FacebookCallbackControllerTest extends TestCase
{
    private FacebookCallbackController $facebook;
    private MockObject $userDb;
    private MockObject $manager;
    private MockObject $request;

    /**
     * @throws Exception
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->facebook=new FacebookCallbackController();
        $this->userDb = $this->createMock(UserRepository::class);
        $this->manager = $this->createMock(EntityManagerInterface::class);
        $this->request = $this->createMock(Request::class);

    }
    public function  testIdentityProviderException(){

        $this->expectException(IdentityProviderException::class);
        $this->facebook->index($this->userDb,$this->manager,$this->request);
    }

    public function  testErrorException(){

        $this->expectException(\Error::class);
        $this->facebook->index($this->userDb,$this->manager,$this->request);
    }
    public function  testBadCallException(){

        $this->expectException(BadMethodCallException::class);
        $this->facebook->index($this->userDb,$this->manager,$this->request);
    }


}