<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Arnaud LEMAIRE  <alemaire@ibsciss.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class Filtering implements Reducer{

    protected $next_reducer;
    protected $callback;

    public function __construct(Reducer $next_reducer, Callable $callback)
    {
        $this->next_reducer = $next_reducer;
        $this->callback = $callback;
    }

    public function init()
    {
        return $this->next_reducer->init();
    }

    public function step($result, $current)
    {
        if($this->callback->__invoke($current)) {
            return $this->next_reducer->step(
                $result, $current
            );
        }

        return $result;
    }

    public function complete($result)
    {
        return $this->next_reducer->complete($result);
    }
}