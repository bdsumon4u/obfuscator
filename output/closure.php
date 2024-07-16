<?php

namespace App\Functions;

use Closure;
class CEx extends \Exception
{
    public function __construct(?string $message = null, $code = 0, $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
new CEx('No Message');
$func = function (Closure $call, string $str): ?string {
    return $call($str);
};
try {
    $var = 'Hello';
    $vvar = 'var';
    echo ${$vvar};
    $func(fn() => $var, 'mystr');
} catch (CEx $e) {
    echo $e->getMessage();
}