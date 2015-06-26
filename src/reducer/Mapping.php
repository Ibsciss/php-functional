<?php
namespace Fp\Reducer;

class Mapping implements Reducer
{

    protected $next_reducer;
    protected $callback;

    public function __construct(Reducer $next_reducer, Callable $callback)
    {
        $this->next_reducer = $next_reducer;
        $this->callback = $callback;
    }

    public function init()
    {
        return $this->next_reducer->init();
    }

    public function step($result, $current)
    {
        return $this->next_reducer->step(
            $result, $this->callback->__invoke($current)
        );
    }

    public function complete($result)
    {
        return $this->next_reducer->complete($result);
    }
}