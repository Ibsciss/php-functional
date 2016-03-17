<?php

namespace Fp\Reducer\Mixin;
use Fp\Reducer\Reducer;

/**
 * Created by PhpStorm.
 * User: alemaire
 * Date: 17/03/2016
 * Time: 21:03
 */
trait WithCallback
{
    protected $next_reducer;
    protected $callback;

    public function __construct(Reducer $next_reducer, callable $callback)
    {
        $this->next_reducer = $next_reducer;
        $this->callback = $callback;
    }

}