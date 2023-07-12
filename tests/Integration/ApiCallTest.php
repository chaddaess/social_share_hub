<?php

namespace App\Tests\Integration;

use App\Entity\User;
use http\Env\Response;
use League\OAuth2\Client\Provider\LinkedInResourceOwner;
use League\OAuth2\Client\Token\AccessToken;
use Monolog\Test\TestCase;
use PHPUnit\Framework\MockObject\Exception;
use Symfony\Bundle\MakerBundle\Str;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class ApiCallTest extends TestCase
{
    private ExtractedCodeApiCalls $testObject;
    private array $socialsArray;
    private string $text;
    private String $access_token_tw;
    private String $access_token_link;
    private String $userId;

    /**
     * @throws Exception
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->testObject=new ExtractedCodeApiCalls();
        $this->socialsArray=['linkedin','twitter'];
        $this->text="hi , this is a test";
        $this->access_token_tw="111";
        $this->access_token_link="111";
        $this->userId="cRe5O_7NnT";
    }

    /**
     * @throws Exception
     */
    public function testMakeCallWithWrongTokens(){
        $text=$this->text;
        $socialsArray=$this->socialsArray;
        $userID=$this->userId;
        $access_token_tw=$this->access_token_tw;
        $access_token_link=$this->access_token_link;
        $result=$this->testObject->makeCalls($socialsArray,$text,$access_token_link,$userID,$access_token_tw);
        $this->assertEquals(true, $result);
    }

}