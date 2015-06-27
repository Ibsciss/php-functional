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