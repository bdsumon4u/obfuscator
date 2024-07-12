<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class Hotash extends Facade
{
    protected static function getFacadeAccessor()
    {
        return static::class;
    }
}
