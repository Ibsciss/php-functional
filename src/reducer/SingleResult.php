<?php
/**
 * Created by IntelliJ IDEA.
 * User: alemaire
 * Date: 26/06/2015
 * Time: 01:39
 */

namespace Fp\reducer;


class SingleResult implements Reducer {

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
        if($result instanceof Reduced) {
            return $result->value();
        }

        return $result;
    }
}