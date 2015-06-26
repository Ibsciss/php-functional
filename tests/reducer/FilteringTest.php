<?php
/**
 * Created by IntelliJ IDEA.
 * User: alemaire
 * Date: 25/06/2015
 * Time: 15:39
 */

namespace Fp\Test;

use Fp;

class FilteringTest extends \PHPUnit_Framework_TestCase
{
    public function testIsAReducer()
    {
        $transducer = Fp\filtering(is_even_makker());
        $this->assertInstanceOf('Fp\\Reducer\\Reducer', $transducer(Fp\appending()));
    }

    public function testItApplyTheCallableOnEachItem()
    {
        $transducer = Fp\filtering(is_even_makker());

        $squared = Fp\transduce($transducer, Fp\appending(), range(1, 6));

        $this->assertEquals([2, 4, 6], $squared);
    }
}
