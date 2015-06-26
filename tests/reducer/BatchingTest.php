<?php
/**
 * Created by IntelliJ IDEA.
 * User: alemaire
 * Date: 25/06/2015
 * Time: 16:57
 */

namespace Fp\Test;

use Fp;

class BatchingTest extends \PHPUnit_Framework_TestCase
{
    public function testIsAReducer()
    {
        $transducer = Fp\batching(3);
        $this->assertInstanceOf('Fp\\Reducer\\Reducer', $transducer(Fp\appending()));
    }

    public function testItBatchItems()
    {
        $transducer = Fp\batching(3);

        $transformed = Fp\transduce($transducer, Fp\appending(), range(1, 6));

        $this->assertEquals([[1, 2, 3], [4, 5, 6]], $transformed);
    }

    public function testPartialFinalBatch()
    {
        $transducer = Fp\batching(3);

        $transformed = Fp\transduce($transducer, Fp\appending(), range(1, 5));
        $this->assertEquals([[1, 2, 3], [4, 5]], $transformed);
    }
}