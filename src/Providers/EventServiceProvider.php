<?php

namespace KaanTanis\FilamentPasswordConfirmation\Providers;

use Illuminate\Auth\Events\Login;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        Login::class => [
            \KaanTanis\FilamentPasswordConfirmation\Events\UserLoggedIn::class,
        ],
    ];

    public function boot()
    {
        parent::boot();
    }
}
