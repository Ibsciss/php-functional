<?php
/**
 * Created by IntelliJ IDEA.
 * User: alemaire
 * Date: 26/06/2015
 * Time: 13:25
 */

namespace Fp\Test;

use Fp;

class SingleResultTest extends \PHPUnit_Framework_TestCase
{
    public function testIsAReducer()
    {
        $transducer = Fp\single_result();
        $this->assertInstanceOf('Fp\\Reducer\\Reducer', $transducer);
    }

    public function testItReturnASingleValueForEarlyTerminaisonTransducer()
    {
        $transducer = Fp\first(equal_three_makker());

        $reduced = Fp\transduce($transducer, Fp\single_result(), range(1, 6));
        $this->assertEquals(3, $reduced);
    }

    public function testItReturnASingleValueForCollectionTransducer()
    {
        $transducer = Fp\filtering(is_even_makker());

        $reduced = Fp\transduce($transducer, Fp\single_result(), range(3, 6));
        $this->assertEquals(4, $reduced);
    }
}