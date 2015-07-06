<?php


namespace Fp\Test;

use Fp\Collection\Collection;
use Fp;

class CollectionTest extends \PHPUnit_Framework_TestCase
{

    public function setUp()
    {
        $this->collection = new Collection([1,2,3,4]);
    }

    public function testInitWithArray()
    {
        $this->assertEquals([1,2,3,4], $this->collection->values());
        $this->assertEquals([1,2,3,4], $this->collection->toArray());
    }

    public function testMap()
    {
        $this->assertEquals([1,4,9,16], $this->collection->map(square_makker())->values());
    }

    public function testFilter()
    {
        $this->assertEquals([2,4], $this->collection->filter(is_even_makker())->values());
    }

    public function testChaining()
    {
        $this->assertEquals([4,16],
            $this->collection
                ->filter(is_even_makker())
                ->map(square_makker())
                ->values()
        );
    }

    public function testTransducing()
    {
        $transduced = $this->collection->transduce(
            Fp\compose(
              Fp\map(square_makker()),
              Fp\filter(is_even_makker())
            ),
            Fp\appending()
        )->values();

        $this->assertEquals([4,16], $transduced);
    }

    public function testHead()
    {
        $this->assertEquals(1, $this->collection->head());
    }

    public function testTail()
    {
        $this->assertEquals([2,3,4], $this->collection->tail()->values());
    }
}