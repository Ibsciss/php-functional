<?php
/**
 * Created by IntelliJ IDEA.
 * User: alemaire
 * Date: 25/06/2015
 * Time: 14:00
 */

namespace Fp\reducer;


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