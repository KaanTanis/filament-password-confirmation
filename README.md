# Filament Password Confirmation

## Art

![Screenshot](https://raw.githubusercontent.com/KaanTanis/filament-password-confirmation/main/art/login-page.jpg)

This package allows you to attach a middleware for password confirmation to your routes. 
If user time is expired, the user will be redirected to a password confirmation page.

This feature protects your routes if you have a long session time.

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
    'auth' => [
        ...
        \KaanTanis\FilamentPasswordConfirmation\Http\Middleware\PasswordConfirmationMiddleware::class
    ],
]
```

Time out can be configured in the config file. Default is 10800 seconds.
```php
'timeout' => 10800 // 3 hours
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Roadmap

- [ ] Not working on post request. If user time is expired, the user will be redirected (or modal) to a password confirmation page.
- [ ] Add more languages
- [ ] Add more documentation
- [ ] Get confirmation on critical actions even if the session doesn't expire
- [ ] Confirmation for specific resources and actions
- [ ] Confirmation from modal
- [ ] Auto redirect/open modal if session is expired

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
