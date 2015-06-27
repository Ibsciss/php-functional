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


class Appending implements Reducer{

    public function init()
    {
        return [];
    }

    public function step($result, $current)
    {
        $result[] = $current;
        return $result;
    }

    public function complete($result)
    {
        return $result;
    }
}