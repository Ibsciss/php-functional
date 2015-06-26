<?php
namespace Fp\Reducer;

interface Reducer {
    public function init();
    public function step($result, $current);
    public function complete($result);
}