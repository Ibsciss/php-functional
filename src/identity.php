<?php

function identity() {
    return function($value) {
        return $value;
    };
}