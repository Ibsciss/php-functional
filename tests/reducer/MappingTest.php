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
