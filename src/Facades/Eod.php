<?php

namespace RadicalLoop\Eod\Facades;

use Illuminate\Support\Facades\Facade;

class Eod extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'radicalloop.eod';
    }
}
