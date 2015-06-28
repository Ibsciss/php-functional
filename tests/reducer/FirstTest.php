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
