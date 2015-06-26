<?php
/**
 * Created by IntelliJ IDEA.
 * User: alemaire
 * Date: 25/06/2015
 * Time: 16:40
 */

namespace Fp\Test;

use Fp;

class EnumeratingTest extends \PHPUnit_Framework_TestCase
{
    public function testIsAReducer()
    {
        $transducer = Fp\enumerating();
        $this->assertInstanceOf('Fp\\Reducer\\Reducer', $transducer(Fp\appending()));
    }

    public function testItEnumerateItems()
    {
        $transducer = Fp\enumerating();

        $transformed = Fp\transduce($transducer, Fp\appending(), range(1, 3));

        $this->assertEquals([[0, 1], [1, 2], [2, 3]], $transformed);
    }
}