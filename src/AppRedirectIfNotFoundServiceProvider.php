<?php

namespace Fuelviews\AppRedirectIfNotFound;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class AppRedirectIfNotFoundServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('app-redirect-if-not-found')
            ->hasConfigFile('app-redirect-if-not-found');
    }
}
