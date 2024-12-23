# This is my package app-redirect-if-not-found

[![Latest Version on Packagist](https://img.shields.io/packagist/v/fuelviews/app-redirect-if-not-found.svg?style=flat-square)](https://packagist.org/packages/fuelviews/app-redirect-if-not-found)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/fuelviews/app-redirect-if-not-found/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/fuelviews/app-redirect-if-not-found/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/fuelviews/app-redirect-if-not-found/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/fuelviews/app-redirect-if-not-found/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/fuelviews/app-redirect-if-not-found.svg?style=flat-square)](https://packagist.org/packages/fuelviews/app-redirect-if-not-found)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require fuelviews/app-redirect-if-not-found
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="app-redirect-if-not-found-config"
```

This is the contents of the published config file:

```php
return [
    'fallback_route' => 'home',
];

```

## Register Middleware

### Laravel 11 - Register middleware in bootstrap/app.php

```php
->withMiddleware(function (Middleware $middleware) {
    $middleware->use([
        \Fuelviews\AppRedirectIfNotFound\Middleware\AppRedirectIfNotFoundMiddleware::class,
    ]);
})
```

### Laravel 10 - Register middleware in app/Http/Kernel.php

```php
protected $middleware = [
    \App\Http\Middleware\TrustProxies::class,
    \Illuminate\Http\Middleware\HandleCors::class,
    \App\Http\Middleware\PreventRequestsDuringMaintenance::class,
    \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
    \App\Http\Middleware\TrimStrings::class,
    \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    \Illuminate\Session\Middleware\StartSession::class,
    \App\Http\Middleware\RedirectIfNotFound::class,
];
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Thejmitchener](https://github.com/fuelviews)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
