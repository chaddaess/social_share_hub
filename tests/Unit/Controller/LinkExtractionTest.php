<?php

namespace App\Tests\Unit\Controller;

use App\Controller\PostContentController;
use Monolog\Test\TestCase;

class LinkExtractionTest extends TestCase
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
            ['https://www.goodreads.com/','https://www.goodreads.com/'],//should pass
            ['amal',''],//should pass
            ['',''],
            ['htt',''],
            ['hihttps://google.comhi','https://google.comhi'],
            ['hihttps://google.com hi','https://google.com']

        ]);
    }

}