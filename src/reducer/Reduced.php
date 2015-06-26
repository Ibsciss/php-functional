<?php
/**
 * Created by IntelliJ IDEA.
 * User: alemaire
 * Date: 26/06/2015
 * Time: 00:46
 */

namespace Fp\reducer;


class Reduced {

    protected $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function value()
    {
        return $this->value;
    }
}