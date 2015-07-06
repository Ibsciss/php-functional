# Php Functional

<!--
[![Latest Version on Packagist](https://img.shields.io/packagist/v/league/:package_name.svg?style=flat-square)](https://packagist.org/packages/league/:package_name)
-->
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/ibsciss/php-functional/master.svg?style=flat-square)](https://travis-ci.org/ibsciss/php-functional)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/ibsciss/php-functional.svg?style=flat-square)](https://scrutinizer-ci.com/g/ibsciss/php-functional/code-structure)
[![Quality Score](https://img.shields.io/scrutinizer/g/ibsciss/php-functional.svg?style=flat-square)](https://scrutinizer-ci.com/g/ibsciss/php-functional)
[![Total Downloads](https://img.shields.io/packagist/dt/ibsciss/php-functional.svg?style=flat-square)](https://packagist.org/packages/ibsciss/php-functional)

A collection of functions and classes to provide some nice functional tools for your projects, with a simple, consistent and well tested api.

## Install

Via Composer

``` bash
$ composer require ibsciss/php-functionnal
```

## Usage

## Functional helper

### Compose

The compose function give you the ability to create a new functions from existing functions:

```
compose(f,g,h)(x) == f(g(h(x)))
```


### Pipelines functions

Pipelines functions are use to apply transformations to a collection, Martin Fowler wrote a [very good introduction (based on ruby)](http://martinfowler.com/articles/collection-pipeline/) about it.

On the same blog, you'll find another resource to learn [how to refactor your too many loops using pipeline](http://martinfowler.com/articles/refactoring-pipelines.html).

Some functions are wrapper around the native php function, to understand why we have made them please see the [FAQ](#faq).

#### Map

`Fp\map(callable(current), collection)` is a wrapper around the [array_map](http://php.net/manual/fr/function.array-map.php) function (with some nice features, we'll see later).

It build a new array by applying a function to each items of the given collection:
```php
//square each item of the collection
Fp\map(
  function($x) {
    return pow($x, 2);
  }, [1,2,3]
); //return [1,4,9,16]
```

#### Filter

`Fp\filter(callable(current), collection)` is a wrapper around the [array_filter](http://php.net/manual/fr/function.array-filter.php) function (with some nice features we'll see later).

It build a new array containing all items on which the given callback has return true:
```php
//return even values from the collection
Fp\filter(
  function($x) {
    return ($x % 2 == 0);
  },
  [1,2,3,4]
); //return [2,4]
``` 

#### Reduce

`Fp\reduce(callable(carry, current), collection, init)` is a wrapper around the [array_reduce](http://php.net/manual/fr/function.array-reduce.php) function (with some nice features, we'll see later). 

It reduce a collection to a single value by passing each item to the given callback. The callback returning value is returned for the next call (for the first call, the init value is provided instead).
```php
//sum values of the collection
Fp\reduce(
  function($carry, $item) {
    return $carray + $item
  },
  [1,2,3,4],
  0
); //return 10
```

#### Chaining

You can chain operations by using the `Fp\collection(collection)` function (don't forget the `values()` call to get the results:
 
```php
//squared even values from the given collection
Fp\collection([1,2,3,4])
  ->filter(
    function($x) { return ($x % 2 == 0); }
  )
  ->map(
    function($x) { return pow($x, 2); }
  )
  ->values();  
```

### collection transformer transducers 

#### Mapping
like map

#### Filtering
like filter

### scalar transducer

Use with `single_result` terminal reducer.

#### First
return the first element

#### Max 
return the max

### Aggregate reducer

#### Batching
Batch result

#### Enumerating
Create indexed tuples with results

### Terminal reducer

#### appending
append to an array

#### conjoining
immutable appending by merge

#### single_result
to get a scalar result instead of a collection

## FAQ

### Why not using directly array_\* (array_filter, array_map) functions ?

 - To improve api consistency
 - To be able to produce transducers if the iterable is omitted
 - To be able to consume `Collection` objects.

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email :author_email instead of using the issue tracker.

## Credits

- [Arnaud LEMAIRE](https://github.com/lilobase)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
