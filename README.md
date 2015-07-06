# Php Functional

<!--
[![Latest Version on Packagist](https://img.shields.io/packagist/v/league/:package_name.svg?style=flat-square)](https://packagist.org/packages/league/:package_name)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/thephpleague/:package_name/master.svg?style=flat-square)](https://travis-ci.org/thephpleague/:package_name)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/thephpleague/:package_name.svg?style=flat-square)](https://scrutinizer-ci.com/g/thephpleague/:package_name/code-structure)
[![Quality Score](https://img.shields.io/scrutinizer/g/thephpleague/:package_name.svg?style=flat-square)](https://scrutinizer-ci.com/g/thephpleague/:package_name)
[![Total Downloads](https://img.shields.io/packagist/dt/league/:package_name.svg?style=flat-square)](https://packagist.org/packages/league/:package_name)
-->

A collection of functions and classes to provide some nice functional tools for your projects, with a simple, consistent and well tested api.

## Install

Via Composer

``` bash
$ composer require ibsciss/php-functionnal
```

## Usage

### Pipelines functions

Pipelines functions are use to apply transformations to a collection, Martin Fowler wrote a [very good introduction (based on ruby)](http://martinfowler.com/articles/collection-pipeline/) to this style of programming.

On the same blog, you'll find another resource to learn [how to refactor your too many loop using pipeline](http://martinfowler.com/articles/refactoring-pipelines.html).

Some functions are wrapper around the native php function, to understand why we have made these wrappers, please see the FAQ (at the end of this document).

#### Map

`Fp\map(callable(current), collection)` is a wrapper around the [array_map](http://php.net/manual/fr/function.array-map.php) function (with some nice features, we'll see later).

It build a new array by applying a function to each items of the given collection:
```
//square each item of the collection
Fp\map(
  function($x) {
    return pow($x, 2);
  }, [1,2,3]
); //return [1,4,9,16]
```

#### Filter

`Fp\filter(callable(current), collection)` is a wrapper around the [array_filter](http://php.net/manual/fr/function.array-filter.php) function (with some nice features we'll see later).

It build a new array containing all item or which the given callback has return true:
```
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

It reduce to a single value a collection by passing each item to the given callback, the callback returning value is returned for the next call (for the first call, the init value is provided instead).

```
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

A nice feature of the library is the possibility to chain operations. For this you need to use the `Fp\collection(collection)`:
 
```
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

**Don't forget to call the `values()` method to get the final array**

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