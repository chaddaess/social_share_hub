<?php

namespace App\Tests\Unit\Controller;

use App\Controller\PostContentController;
use Monolog\Test\TestCase;

class PictureExtractionTest extends TestCase
{
    private PostContentController $testObject;
    public function  setUp(): void
    {
        parent::setUp();
        $this->testObject=new PostContentController();
    }
    /** @dataProvider provider*/
    public function testPictureShouldBeExtracted($url,$picture){
        $result=$this->testObject->extractPicture($url);
        $this->assertEquals($result,$picture);

    }
    public static function provider():array {
        return([
           [
               "https://www.mosaiquefm.net/ar/%D8%AA%D9%88%D9%86%D8%B3-%D8%A3%D8%AE%D8%A8%D8%A7%D8%B1-%D9%88%D8%B7%D9%86%D9%8A%D8%A9/1176902/%D8%A7%D9%84%D8%A3%D8%AD%D8%AF-%D8%B7%D9%82%D8%B3-%D8%AD%D8%A7%D8%B1-%D9%88%D8%A7%D9%84%D8%AD%D8%B1%D8%A7%D8%B1%D8%A9-%D8%A7%D9%84%D9%82%D8%B5%D9%88%D9%89-%D8%AA%D8%B5%D9%84-49",
               "https://content.mosaiquefm.net/uploads/content/thumbnails/1688856576_media.jpg"
           ],
           [
               "https://www.ifm.tn/fr/article/english-news/today-s-weather/71441",
               "img/article.png"
           ],
           [
           "https://www.ifm.tn/fr/article/english-news/today-s-weather/71441",
               "img/article.png"
           ],
           [
              "https://www.ifm.tn/fr/article/english-news/civil-protection-23-deaths-and-377-injuries-during-the-past-24-hours/71446",
                "img/article.png",
           ],
           [
                "https://www.shemsfm.net/amp/ar/%D8%A7%D9%84%D8%A3%D8%AE%D8%A8%D8%A7%D8%B1_%D8%B4%D9%85%D8%B3-%D8%A7%D9%84%D8%A7%D8%AE%D8%A8%D8%A7%D8%B1/420893/%D9%86%D8%A7%D9%81%D8%B9-%D8%A7%D9%84%D8%B9%D8%B1%D9%8A%D8%A8%D9%8A-%D8%A7%D9%84%D9%85%D8%B1%D8%B3%D9%88%D9%85-54-%D8%B2%D8%A7%D8%AF-%D8%A7%D9%84%D9%88%D8%B6%D8%B9-%D8%AA%D8%B9%D9%81%D9%86%D8%A7",
                "img/article.png"
           ],
           [
               "https://nonsenselinkshouldfail.com",
               "img/article.png"
           ],

        ]);
    }

}