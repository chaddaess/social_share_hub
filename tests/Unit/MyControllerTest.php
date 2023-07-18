<?php

namespace App\Tests\Unit;

use App\Controller\MyController;
use PHPUnit\Framework\TestCase;

class MyControllerTest extends TestCase
{

    private MyController $myController;

    protected function setUp(): void
    {
        parent::setUp();
        $this->myController = new MyController();
    }

    /** @dataProvider provider */
    public function testConcat($a, $b, $c)
    {

        $result = $this->myController->concat($a, $b);
        $this->assertEquals($c, $result);

    }

    public static function provider(): array
    {
        return ([
            ["chadha", "essid", "chadhaessid"],
            ["amal", "essid", "amalessid"],

        ]);
    }
}
