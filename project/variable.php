<?php

namespace App\Functions;

use Exception;

$var = 'aslfj';

const ABC = 'abc';

define('DEF', 'def');

try {

} catch (Exception $ex) {
    dump($ex);
}

function self(): bool {
    if (defined('DEF') && defined('ABC')) {
        return ABC === 'abc' && DEF === 'def';
    }

    return __FUNCTION__ === 'self';
}

class Demo
{
    const XYZ = 'xyz';

    private bool $var;

    public function __construct()
    {
        if (static::XYZ === 'xyz' && ABC === 'abc' && DEF === 'def')
        $this->var = ABC === 'abc' && DEF === 'def';
        echo self::XYZ;
        dump(Demo::XYZ);
    }
}

new Demo();

echo Demo::XYZ;