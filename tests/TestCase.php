<?php

namespace Fuelviews\RedirectIfNotFound\Tests;

use Fuelviews\RedirectIfNotFound\RedirectIfNotFoundServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    #[\Override]
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName): string => 'Fuelviews\\RedirectIfNotFound\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            RedirectIfNotFoundServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_app-redirect-if-not-found_table.php.stub';
        $migration->up();
        */

        // Define routes for testing
        $app['router']->get('home', function () {
            return 'Home Page';
        })->name('home');
    }
}
