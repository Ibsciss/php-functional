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
use Fp\Collection\Collection;

class CollectionPipelineTest extends \PHPUnit_Framework_TestCase
{
    public function testCompositionWithMapFilterWithArityOfOne()
    {
        $transduced = Fp\transduce(
            Fp\compose(
                Fp\map(square_makker()),
                Fp\filter(is_even_makker())
            ),
            Fp\appending(),
            [1,2,3,4,5,6]
        );

        $this->assertEquals([4,16,36], $transduced);
    }

    public function testMapWithArityTwo()
    {
        $this->assertEquals([1,4,9], Fp\map(square_makker(), [1,2,3]));
    }

    public function testFilterWithArityTwo()
    {
        $this->assertEquals([2,4], Fp\filter(is_even_makker(), [1,2,3,4]));
    }

    public function testCollectionFunction()
    {
        $this->assertEquals([1,2,3], Fp\collection([1,2,3])->values());
    }

    public function testHead()
    {
        $this->assertEquals(1, Fp\head([1,2,3]));
    }

    public function testTail()
    {
        $this->assertEquals([2,3], Fp\tail([1,2,3]));
    }

    public function testMapWithCollection()
    {
        $this->assertEquals([1,4,9], Fp\map(square_makker(), new Fp\Collection\Collection([1,2,3]))->values());
    }

    public function testFilterWithCollection()
    {
        $this->assertEquals([2,4], Fp\filter(is_even_makker(), new Fp\Collection\Collection([1,2,3,4]))->values());
    }

    public function testHeadWithCollection()
    {
        $this->assertEquals(1, Fp\head(new Collection([1,2,3])));
    }

    public function testTailWithCollection()
    {
        $this->assertEquals([2,3], Fp\tail(new Collection([1,2,3]))->values());
    }
}