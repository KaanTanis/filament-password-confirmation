<?php

use Illuminate\Support\Facades\Route;
use KaanTanis\FilamentPasswordConfirmation\Http\Livewire\Auth\PasswordConfirmation;

Route::domain(config('filament.domain'))
    ->middleware(config('filament.middleware.base'))
    ->name('filament.')
    ->group(function () {
        Route::prefix(config('filament.path'))->group(function () {
            Route::get('/confirm-password', PasswordConfirmation::class)
                ->name('password.confirm');
        });
    });
