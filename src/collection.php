<?php

namespace Fp;

use Fp\Collection\Collection;

/**
 * return a new array built by applying a function to each item of the given iterable
 * if iterable is null, return the corresponding transducer
 * if iterable is an instance of Collection, call the corresponding methods and return the resulting collection object
 *
 * @param callable $callback the applied function
 * @param null|array|Collection $iterable
 * @return array|\Closure|Collection
 */
function map(callable $callback, $iterable = null)
{
    if ($iterable === null){
        return mapping($callback);
    } elseif ($iterable instanceof Collection) {
        return $iterable->map($callback);
    }

    return array_map($callback, $iterable);
}

/**
 * return a new array built by filtering items through a given callback
 * if iterable is null, return the corresponding transducer
 * if iterable is an instance of Collection, call the corresponding methods and return the resulting collection object
 *
 * @param callable $callback the filter function
 * @param null|array|Collection $iterable
 * @return array|\Closure|Collection
 */
function filter(callable $callback, $iterable = null)
{
    if($iterable === null) {
        return filtering($callback);
    } elseif ($iterable instanceof Collection) {
        return $iterable->filter($callback);
    }

    return array_values( //to reindex array
        array_filter($iterable, $callback));
}

function reduce(callable $callback, $iterable, $init)
{
    return array_reduce($iterable, $callback, $init);
}

function head($array)
{
    return $array[0];
}

function tail($array)
{
    if($array instanceof Collection) {
        return $array->tail();
    }
    return array_slice($array, 1);
}

function collection($array)
{
    return new Collection($array);
}
