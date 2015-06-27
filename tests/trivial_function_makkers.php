<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Arnaud LEMAIRE  <alemaire@ibsciss.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

function plus_one_makker()
{
    return function ($x) {
        return $x + 1;
    };
}

function square_makker()
{
    return function ($x) {
        return pow($x, 2);
    };
}

function is_even_makker()
{
    return function ($x) {
        return ($x % 2 == 0);
    };
}

function equal_three_makker()
{
    return function ($x) {
        return ($x == 3);
    };
}
