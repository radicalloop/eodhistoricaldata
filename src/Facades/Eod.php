<?php

namespace RadicalLoop\Eod\Facades;

use Illuminate\Support\Facades\Facade;
use RadicalLoop\Eod\Api\Exchange;
use RadicalLoop\Eod\Api\Stock;

/**
 * @method static Stock stock()
 * @method static Exchange exchange()
 */
class Eod extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'radicalloop.eod';
    }

}
