<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Arnaud LEMAIRE  <alemaire@ibsciss.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
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
