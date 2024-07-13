<?php

namespace App\Functions;

function self() {

}

class throw {}

if (! function_exists('abc')) {
    function abc(REt $var): REt
    {
        return $var;
    }
}

$func = function ($var) {
    return $var;
};

try {
    $var = 'Hello';
    $vvar = 'var';
    echo $$vvar;

    $func($var);
} catch (REt $e) {
    echo $e->getMessage();
}

abc('xyz');
