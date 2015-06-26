<?php
/**
 * Created by IntelliJ IDEA.
 * User: alemaire
 * Date: 25/06/2015
 * Time: 14:21
 */

namespace Fp\Test;

use Fp;

class ComposeTest extends \PHPUnit_Framework_TestCase
{

    public function testComposability()
    {

        $composed = Fp\compose(plus_one_makker(), square_makker());

        $this->assertEquals(10, $composed(3));
    }

    public function testComposabilityWithOnlyOneFunction()
    {
        $composed = Fp\compose(plus_one_makker());

        $this->assertEquals(4, $composed(3));
    }

    public function testComposabilityWithHimself()
    {
        $composed = Fp\compose(plus_one_makker(), plus_one_makker(),
                        Fp\compose(plus_one_makker(), square_makker())
                    );
        $this->assertEquals(12, $composed(3));
    }
}