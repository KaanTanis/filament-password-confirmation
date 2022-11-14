<?php

namespace KaanTanis\FilamentPasswordConfirmation;

use KaanTanis\FilamentPasswordConfirmation\Http\Livewire\Auth\PasswordConfirmation;
use KaanTanis\FilamentPasswordConfirmation\Providers\EventServiceProvider;
use Livewire\Livewire;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentPasswordConfirmationServiceProvider extends PackageServiceProvider
{
    /**
     * @param  Package  $package
     * @return void
     */
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

    /**
     * @return void
     */
    public function bootingPackage(): void
    {
        Livewire::component('filament-password-confirmation::password-confirmation', PasswordConfirmation::class);
    }

    /**
     * @return void
     */
    public function registeringPackage(): void
    {
        $this->app->register(EventServiceProvider::class);
    }
}
