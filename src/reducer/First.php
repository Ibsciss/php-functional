<?php
/**
 * Created by IntelliJ IDEA.
 * User: alemaire
 * Date: 26/06/2015
 * Time: 01:28
 */

namespace Fp\reducer;


class First implements Reducer {

    protected $next_reducer;
    protected $callback;

    public function __construct(Reducer $next_reducer, Callable $callback)
    {
        $this->next_reducer = $next_reducer;
        $this->callback = $callback;
    }

    public function init()
    {
        $this->next_reducer->init();
    }

    public function step($result, $current)
    {
        if($this->callback->__invoke($current)) {
            return new Reduced($this->next_reducer->step($result, $current));
        }

        return $result;
    }

    public function complete($result)
    {
        return $this->next_reducer->complete($result);
    }
}