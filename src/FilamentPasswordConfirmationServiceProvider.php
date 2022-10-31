<?php

namespace KaanTanis\FilamentPasswordConfirmation;

use KaanTanis\FilamentPasswordConfirmation\Http\Livewire\Auth\PasswordConfirmation;
use Livewire\Livewire;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use KaanTanis\FilamentPasswordConfirmation\Commands\FilamentPasswordConfirmationCommand;

class FilamentPasswordConfirmationServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('filament-password-confirmation')
            ->hasConfigFile()
            ->hasViews()
            ->hasTranslations()
            ->hasRoute('web');
    }

    public function boot()
    {
        parent::boot();

        Livewire::component('filament-password-confirmation::password-confirmation', PasswordConfirmation::class);
    }
}
