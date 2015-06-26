<?php
namespace Fp;

use Fp\reducer\Reduced;
use Fp\Reducer\Reducer;

function transduce(callable $transducer, Reducer $reducer, Array $iterable, $init = null)
{
    $internal_reducer = $transducer($reducer);

    $accumulator = (is_null($init)) ? $internal_reducer->init() : $init;
    foreach($iterable as $current) {
        $accumulator = $internal_reducer->step($accumulator, $current);

        //early termination
        if($accumulator instanceof Reduced) {
            $accumulator = $accumulator->value();
            break;
        }
    }

    return $internal_reducer->complete($accumulator);
}