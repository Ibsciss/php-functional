<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Arnaud LEMAIRE  <alemaire@ibsciss.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Fp\reducer\Termination;

use Fp\reducer\Reduced;
use Fp\reducer\Reducer;

class SingleResult implements Reducer
{
    public function init()
    {
        return;
    }

    public function step($result, $current)
    {
        return new Reduced($current);
    }

    public function complete($result)
    {
        if ($result instanceof Reduced) {
            return $result->value();
        }

        return $result;
    }
}
