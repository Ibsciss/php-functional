<?php
/**
 * Created by IntelliJ IDEA.
 * User: alemaire
 * Date: 26/06/2015
 * Time: 01:36
 */

namespace Fp\Test;

use Fp;

class FirstTest extends \PHPUnit_Framework_TestCase
{
    public function testIsAReducer()
    {
        $transducer = Fp\first(equal_three_makker());
        $this->assertInstanceOf('Fp\\Reducer\\Reducer', $transducer(Fp\appending()));
    }

    public function testItApplyTheCallableOnEachItem()
    {
        $transducer = Fp\first(equal_three_makker());

        $reduced = Fp\transduce($transducer, Fp\single_result(), range(1, 6));
        $this->assertEquals(3, $reduced);
    }
}