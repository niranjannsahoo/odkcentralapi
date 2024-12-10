<?php
namespace Niranjannsahoo\Odkcentralapi\Facades;

use Illuminate\Support\Facades\Facade;

class OdkCentralApi extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'odkcentralapi';
    }
}

