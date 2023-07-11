<?php

namespace App\Tests\Unit\Controller;

use App\Controller\TwitterCallbackController;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use http\Exception\BadMethodCallException;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;
use PHPUnit\Framework\MockObject\MockObject;

class TwitterCallBackControllerTest extends TestCase
{
    private TwitterCallbackController $twitter;
    private MockObject $userDb;
    private MockObject $manager;
    private MockObject $request;


    /**
     * @throws Exception
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->twitter=new TwitterCallbackController();
        $this->userDb = $this->createMock(UserRepository::class);
        $this->manager = $this->createMock(EntityManagerInterface::class);
        $this->request = $this->createMock(Request::class);

    }

    public function  testIdentityProviderException(){

        $this->expectException(IdentityProviderException::class);
        $this->twitter->index($this->userDb,$this->manager,$this->request);
    }
    public function  testErrorException(){

        $this->expectException(\Error::class);
        $this->twitter->index($this->userDb,$this->manager,$this->request);
    }
    public function  testBadCallException(){

        $this->expectException(BadMethodCallException::class);
        $this->twitter->index($this->userDb,$this->manager,$this->request);
    }


}