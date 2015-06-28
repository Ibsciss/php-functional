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

class Reduced
{
    protected $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function value()
    {
        return $this->value;
    }
}
