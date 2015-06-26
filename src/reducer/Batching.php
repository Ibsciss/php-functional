<?php
/**
 * Created by IntelliJ IDEA.
 * User: alemaire
 * Date: 25/06/2015
 * Time: 17:00
 */

namespace Fp\reducer;


class Batching implements Reducer {

    protected $next_reducer;
    protected $batch_size;
    protected $current_batch = [];

    public function __construct(Reducer $next_reducer, $batch_size)
    {
        if(!is_int($batch_size)) {
            throw \InvalidArgumentException('argument #2 of Batching::__construct must be an integer');
        }

        $this->batch_size = $batch_size;
        $this->next_reducer = $next_reducer;
    }

    public function init()
    {
        return $this->next_reducer->init();
    }

    public function step($result, $current)
    {
        $this->current_batch[] = $current;
        if(count($this->current_batch) >= $this->batch_size) {
            $batch = $this->current_batch;
            $this->current_batch = [];
            return $this->next_reducer->step($result, $batch);
        }

        return $result;
    }

    public function complete($result)
    {
        if(count($this->current_batch) > 0) {
            $result = $this->next_reducer->step($result, $this->current_batch);
        }
        return $this->next_reducer->complete($result);
    }
}