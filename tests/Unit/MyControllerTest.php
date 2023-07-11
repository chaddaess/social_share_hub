<?php

use App\Controller\MyController;
use PHPUnit\Framework\TestCase;
class MyControllerTest extends TestCase {

    protected function setUp(): void
    {
        parent::setUp();
        $this->myController=new MyController();
    }

    private MyController $myController;
    /** @dataProvider provider*/
    public function testConcat($a,$b,$c){

        $result=$this->myController->concat($a,$b);
        $this->assertEquals($c,$result);

    }

    public static function provider():array {
        return([
            ["chadha","essid","chadhaessid"],
            ["amal","essid","amalessid"],
        ]);
    }
}
