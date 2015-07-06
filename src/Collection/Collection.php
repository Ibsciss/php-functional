<?php
/**
 * Created by IntelliJ IDEA.
 * User: alemaire
 * Date: 06/07/2015
 * Time: 11:04
 */

namespace Fp\Collection;
use Fp;

class Collection extends \ArrayObject
{
    public function values()
    {
        return $this->getArrayCopy();
    }

    public function toArray()
    {
        return $this->values();
    }

    public function map(callable $callback)
    {
        return new Self(
            Fp\map($callback, $this->values())
        );
    }

    public function filter(callable $callback)
    {
        return new Self(
          Fp\filter($callback, $this->values())
        );
    }

    public function transduce(callable $transducers, Fp\Reducer\Reducer $reducer, $init = null)
    {
        return new Self(
          Fp\transduce($transducers, $reducer, $this->values(), $init)
        );
    }

    public function head()
    {
        return Fp\head($this->values());
    }

    public function tail()
    {
        return new Self(
            Fp\tail($this->values())
        );
    }
}