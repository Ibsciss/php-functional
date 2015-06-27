<?php


/*
 * This file is part of the Symfony package.
 *
 * (c) Arnaud LEMAIRE  <alemaire@ibsciss.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Fp;

use Fp\Reducer\Reduced;
use Fp\Reducer\Reducer;

function transduce(callable $transducer, Reducer $Reducer, Array $iterable, $init = null)
{
    $internal_Reducer = $transducer($reducer);

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