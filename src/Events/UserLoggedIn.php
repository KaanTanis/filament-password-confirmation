<?php

namespace KaanTanis\FilamentPasswordConfirmation\Events;

use Illuminate\Support\Facades\Log;

class UserLoggedIn
{
    public function __invoke(): void
    {
        session()->put('auth.filament_password_confirmed_at', time());
    }
}
