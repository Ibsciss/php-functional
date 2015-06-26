<?php
/**
 * Created by IntelliJ IDEA.
 * User: alemaire
 * Date: 25/06/2015
 * Time: 16:44
 */

namespace Fp\reducer;


class Enumerating implements Reducer{

    protected $next_reducer;
    protected $counter;

    public function __construct(Reducer $next_reducer, $start = 0)
    {
        $this->next_reducer = $next_reducer;
        $this->counter = 0;
    }

    public function init()
    {
        return $this->next_reducer->init();
    }

    public function step($result, $current)
    {
        $index = $this->counter++;
        return $this->next_reducer->step($result, [$index, $current]);
    }

    public function complete($result)
    {
        return $this->next_reducer->complete($result);
    }
}