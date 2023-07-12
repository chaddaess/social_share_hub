<?php

namespace App\Tests\Unit\Controller;

use App\Controller\PostContentController;
use Monolog\Test\TestCase;

class PostContentControllerTest extends TestCase
{
    private PostContentController $testObject;

    public function  setUp(): void
    {
        parent::setUp();
        $this->testObject=new PostContentController();
    }

    /** @dataProvider provider*/
    public function testLinkMethodIsWorking($text,$link){
        $result=$this->testObject->extractLink($text);
        $this->assertEquals($result,$link);
    }
    public static function provider():array {
        return([
            ["hihttps://www.google.com/","https://www.google.com/"],//should pass
            ["amal","https://www.google.com/"],//should fail
        ]);
    }

}