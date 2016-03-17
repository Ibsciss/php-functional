# Php Functional

[![Join the chat at https://gitter.im/Ibsciss/php-functional](https://badges.gitter.im/Join%20Chat.svg)](https://gitter.im/Ibsciss/php-functional?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)

<!--
[![Latest Version on Packagist](https://img.shields.io/packagist/v/league/:package_name.svg?style=flat-square)](https://packagist.org/packages/league/:package_name)
[![Total Downloads](https://img.shields.io/packagist/dt/ibsciss/php-functional.svg?style=flat-square)](https://packagist.org/packages/ibsciss/php-functional)

-->
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Travis CI](https://travis-ci.org/Ibsciss/php-functional.svg?branch=master)](https://travis-ci.org/Ibsciss/php-functional)
[![Code Coverage](https://scrutinizer-ci.com/g/Ibsciss/php-functional/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/Ibsciss/php-functional/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Ibsciss/php-functional/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Ibsciss/php-functional/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/Ibsciss/php-functional/badges/build.png?b=master)](https://scrutinizer-ci.com/g/Ibsciss/php-functional/build-status/master)

A collection of functions and classes to provide some nice functional tools for your projects, with a simple, **consistent** and well tested api.
Really useful to build data processing algorithms in a breeze.

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

Pipelines functions are useful to apply transformations to collections, Martin Fowler wrote a [very good introduction (based on ruby)](http://martinfowler.com/articles/collection-pipeline/) about it.
On the same blog, you'll find another resource to learn [how to refactor your too many loops using pipeline](http://martinfowler.com/articles/refactoring-pipelines.html).

The `map`, `filter` and `reduce` functions are wrapper around the native php function, to understand why we have made them please see the [FAQ](#faq).

#### Map

Apply a function to each item of a collection to create a new array.

```php
//square each item of the collection
Fp\map(
  function($x) {
    return pow($x, 2); //square function
  }, [1,2,3]
); //return [1,4,9,16]
```

#### Filter

Build an array composed with items that returns true when passed in the given callback.

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

It makes an accumulation by passing each item to the given callback.
The callback returning value is returned for the next call (an init value is provided for the first call).

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

You can chain operations by using the `Fp\collection(collection)` function (don't forget to call `values()` to get the results):
 
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

### Collection transducers

With classical pipeline functions, you have to iterate the whole collection for each step of the transformation
and create an intermediate collection which is a massive waste in memory usage.

Moreover you can't really extract a step to use it in other contexts which is bad for code reuse.

To tackle these downsides of classic pipeline function, the functional world come with a nice solution: `tranducers`.

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
