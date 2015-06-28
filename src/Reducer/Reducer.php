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

interface Reducer
{
    public function init();
    public function step($result, $current);
    public function complete($result);
}
