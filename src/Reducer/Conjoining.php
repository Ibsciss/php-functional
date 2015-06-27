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


class Conjoining implements Reducer{

    public function init()
    {
        return [];
    }

    public function step($result, $current)
    {
        return array_merge($result, [$current]);
    }

    public function complete($result)
    {
        return $result;
    }

}