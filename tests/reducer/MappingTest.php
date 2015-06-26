<?php
/**
 * Created by IntelliJ IDEA.
 * User: alemaire
 * Date: 25/06/2015
 * Time: 15:03
 */

namespace Fp\Test;

use Fp;

class MappingTest extends \PHPUnit_Framework_TestCase
{
    public function testIsAReducer()
    {
        $transducer = Fp\mapping(square_makker());
        $this->assertInstanceOf('Fp\\Reducer\\Reducer', $transducer(Fp\appending()));
    }

    public function testItApplyTheCallableOnEachItem()
    {
        $transducer = Fp\mapping(square_makker());

        $squared = Fp\transduce($transducer, Fp\appending(), range(1, 2));

        $this->assertEquals([1, 4], $squared);
    }
}
