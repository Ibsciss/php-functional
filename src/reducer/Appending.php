<?php
/**
 * Created by IntelliJ IDEA.
 * User: alemaire
 * Date: 25/06/2015
 * Time: 13:57
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