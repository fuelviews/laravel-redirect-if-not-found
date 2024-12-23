<?php

namespace Fuelviews\AppRedirectIfNotFound\Tests;

use Fuelviews\AppRedirectIfNotFound\AppRedirectIfNotFoundServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Fuelviews\\AppRedirectIfNotFound\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            AppRedirectIfNotFoundServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_app-redirect-if-not-found_table.php.stub';
        $migration->up();
        */
    }
}
