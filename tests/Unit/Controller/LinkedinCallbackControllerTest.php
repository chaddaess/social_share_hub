<?php

namespace App\Tests\Unit\Controller;

use App\Controller\LinkedinCallbackController;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Error;
use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;

class LinkedinCallbackControllerTest extends TestCase
{
    private LinkedinCallbackController $linkedin;
    private MockObject $userDb;
    private MockObject $manager;
    private MockObject $request;


    /**
     * @throws Exception
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->linkedin=new LinkedinCallbackController();
        $this->userDb = $this->createMock(UserRepository::class);
        $this->manager = $this->createMock(EntityManagerInterface::class);
        $this->request = $this->createMock(Request::class);

    }
    public function  testIdentityProviderException(){
        $this->expectException(Error::class);
        $this->linkedin->index($this->userDb,$this->manager,$this->request);
    }


}