<?php

namespace App\Tests\Unit\Controller;

use App\Controller\PostContentController;
use Monolog\Test\TestCase;

class TextExtractionTest extends TestCase
{

    private PostContentController $testObject;

    public function setUp(): void
    {
        parent::setUp();
        $this->testObject = new PostContentController();
    }

    /** @dataProvider provider */
    public function testTextShouldBeExtractedCorrectly($text, $extractedText)
    {
        $result = $this->testObject->extractText($text);
        $this->assertEquals($result, $extractedText);


    }

    public static function provider(): array
    {
        return ([
            ["hellohttps://google.com", "hello"],
            ["https://google.com", ""],
            ["hellohttp.comhi", "hello"],
            ['hihttps://google.com hi ', 'hi hi'],
            ['https://google.com hi', 'hi'],


        ]);
    }
}