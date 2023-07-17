<?php

namespace App\Tests\Unit\Controller;

use App\Controller\PostContentController;
use Monolog\Test\TestCase;

class LinkInfoExtractionTest extends TestCase
{
    private PostContentController $testObject;
    public function  setUp(): void
    {
        parent::setUp();
        $this->testObject=new PostContentController();
    }
    /** @dataProvider provider*/
    public function testLinkInfoExtractionShouldWork($link,$info)
    {
        $result=$this->testObject->extractInfoLink($link);
        $this->assertSame($result,$info);
    }
        public static function provider():array
        {
            return (
            [
                [
                    "https://nonsenselinkshouldfail.com",
                    ["domain"=>"unknown","title"=>"404 not found"]
                ],
                [
                    "https://www.shemsfm.net/amp/ar/%D8%A7%D9%84%D8%A3%D8%AE%D8%A8%D8%A7%D8%B1_%D8%B4%D9%85%D8%B3-%D8%A7%D9%84%D8%A7%D8%AE%D8%A8%D8%A7%D8%B1/420893/%D9%86%D8%A7%D9%81%D8%B9-%D8%A7%D9%84%D8%B9%D8%B1%D9%8A%D8%A8%D9%8A-%D8%A7%D9%84%D9%85%D8%B1%D8%B3%D9%88%D9%85-54-%D8%B2%D8%A7%D8%AF-%D8%A7%D9%84%D9%88%D8%B6%D8%B9-%D8%AA%D8%B9%D9%81%D9%86%D8%A7",
                    ["domain"=>"www.shemsfm.net","title"=>"نافع العريبي: 'المرسوم 54 زاد الوضع تعفنا'"]
                ],
                [   "https://www.ifm.tn/fr/article/technologie/l-apii-organise-la-5eme-edition-du-concours-national-de-l-innovation/71300",
                    ["domain"=>"www.ifm.tn","title"=>"APII organise la 5ème édition du Concours National de l’Innovation"]

                ],
                [
                    "https://www.google.com/",
                    ["domain"=>"www.google.com","title"=>"Google"]

                ]
            ]
            );

        }


}