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

class Mapping implements Reducer
{
    use Mixin\Stateless;
    use Mixin\WithCallback;

    public function step($result, $current)
    {
        return $this->next_reducer->step(
            $result, $this->callback->__invoke($current)
        );
    }
}
