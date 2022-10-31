# UNDER DEVELOPMENT - DO NOT USE

# Filament Password Confirmation

This package allows you to attach a middleware for password confirmation to your routes. 

## Installation

You can install the package via composer:

```bash<
composer require kaantanis/filament-password-confirmation
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="filament-password-confirmation-config"
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="filament-password-confirmation-views"
```

## Usage

Open your filament.php config file and add the middleware.
```php
'middleware' => [
    'base' => [
        ...
        \Illuminate\Auth\Middleware\RequirePassword::class,
    ],
]
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

- [KaanTanis](https://github.com/KaanTanis)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
