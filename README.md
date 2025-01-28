# This is my package laravel-redirect-if-not-found

[![Latest Version on Packagist](https://img.shields.io/packagist/v/fuelviews/laravel-redirect-if-not-found.svg?style=flat-square)](https://packagist.org/packages/fuelviews/laravel-redirect-if-not-found)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/fuelviews/laravel-redirect-if-not-found/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/fuelviews/laravel-redirect-if-not-found/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/fuelviews/laravel-redirect-if-not-found/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/fuelviews/laravel-redirect-if-not-found/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/fuelviews/laravel-redirect-if-not-found.svg?style=flat-square)](https://packagist.org/packages/fuelviews/laravel-redirect-if-not-found)

## Installation

You can install the package via composer:

```bash
composer require fuelviews/laravel-redirect-if-not-found
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="redirect-if-not-found-config"
```

This is the contents of the published config file:

```php
return [
    'enabled' => true,
    'fallback_route' => 'home',
    'fallback_status_code' => 301,
    'excluded_patterns' => [
        'admin/*',
        'dashboard/admin/*',
        'livewire/*',
        'api/*',
        'glide/*',
    ],
    'environments' => [
        'development',
        'production',
    ],
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
