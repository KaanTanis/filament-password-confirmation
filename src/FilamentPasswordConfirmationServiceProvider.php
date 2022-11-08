<?php

namespace KaanTanis\FilamentPasswordConfirmation;

use KaanTanis\FilamentPasswordConfirmation\Http\Livewire\Auth\PasswordConfirmation;
use KaanTanis\FilamentPasswordConfirmation\Providers\EventServiceProvider;
use Livewire\Livewire;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

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

    public function bootingPackage()
    {
        Livewire::component('filament-password-confirmation::password-confirmation', PasswordConfirmation::class);
    }

    /**
     * @throws
     */
    public function registeringPackage()
    {
        $this->app->register(EventServiceProvider::class);
    }
}
