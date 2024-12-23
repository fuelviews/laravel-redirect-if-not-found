<?php

namespace Fuelviews\AppRedirectIfNotFound\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Fuelviews\AppRedirectIfNotFound\AppRedirectIfNotFound
 */
class AppRedirectIfNotFound extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Fuelviews\AppRedirectIfNotFound\AppRedirectIfNotFound::class;
    }
}
