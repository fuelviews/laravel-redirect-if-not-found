<?php

namespace Fuelviews\RedirectIfNotFound;

use Fuelviews\RedirectIfNotFound\Middleware\RedirectIfNotFoundMiddleware;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Http\Kernel;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class RedirectIfNotFoundServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('redirect-if-not-found')
            ->hasConfigFile('redirect-if-not-found');
    }

    /**
     * @throws BindingResolutionException
     */
    public function packageBooted(): void
    {
        $this->registerMiddlewareGlobally();
    }

    /**
     * @throws BindingResolutionException
     */
    protected function registerMiddlewareGlobally(): void
    {
        $kernel = $this->app->make(Kernel::class);
        $kernel->pushMiddleware(RedirectIfNotFoundMiddleware::class);
    }
}
