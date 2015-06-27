<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Arnaud LEMAIRE  <alemaire@ibsciss.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Fp\reducer;


class Enumerating implements Reducer{

    protected $next_reducer;
    protected $counter;

    public function __construct(Reducer $next_reducer, $start = 0)
    {
        $this->next_reducer = $next_reducer;
        $this->counter = 0;
    }

    public function init()
    {
        return $this->next_reducer->init();
    }

    public function step($result, $current)
    {
        $index = $this->counter++;
        return $this->next_reducer->step($result, [$index, $current]);
    }

    public function complete($result)
    {
        return $this->next_reducer->complete($result);
    }
}