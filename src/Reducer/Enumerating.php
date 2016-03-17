<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Arnaud LEMAIRE  <alemaire@ibsciss.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Fp\Reducer;

class Enumerating implements Reducer
{
    use Mixin\Stateless;

    protected $next_reducer;
    protected $counter;

    public function __construct(Reducer $next_reducer, $start = 0)
    {
        $this->next_reducer = $next_reducer;
        $this->counter = $start;
    }

    public function step($result, $current)
    {
        $index = $this->counter++;

        return $this->next_reducer->step($result, [$index, $current]);
    }
}
