<?php

namespace Fp\Reducer\Mixin;
/**
 * Created by PhpStorm.
 * User: alemaire
 * Date: 17/03/2016
 * Time: 20:57
 */
trait Stateless
{
    public function init()
    {
        return $this->next_reducer->init();
    }

    abstract function step($result, $current);

    public function complete($result)
    {
        return $this->next_reducer->complete($result);
    }
}