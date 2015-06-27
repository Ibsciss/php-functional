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

use Fp\Reducer\Appending;
use Fp\Reducer\Batching;
use Fp\Reducer\Conjoining;
use Fp\Reducer\Enumerating;
use Fp\Reducer\Filtering;
use Fp\Reducer\First;
use Fp\Reducer\Reducer;
use Fp\Reducer\Mapping;
use Fp\Reducer\SingleResult;

function mapping(callable $callback)
{
    $mapping_transducer = function (Reducer $reducer) use ($callback) {
        return new Mapping($reducer, $callback);
    };

    return $mapping_transducer;
}

function filtering(callable $callback)
{
    $filtering_transducer = function (Reducer $reducer) use ($callback) {
        return new Filtering($reducer, $callback);
    };

    return $filtering_transducer;
}

function enumerating($start = 0)
{
    $enumerating_transducer = function (Reducer $reducer) use ($start) {
        return new Enumerating($reducer, $start);
    };

    return $enumerating_transducer;
}

function batching($batch_size)
{
    $batching_transducer = function (Reducer $reducer) use ($batch_size) {
        return new Batching($reducer, $batch_size);
    };

    return $batching_transducer;
}

function first(callable $callback)
{
    $first_transducer = function (Reducer $reducer) use ($callback) {
        return new First($reducer, $callback);
    };

    return $first_transducer;
}

function appending()
{
    return new Appending();
}

function conjoining()
{
    return new Conjoining();
}

function single_result()
{
    return new SingleResult();
}
