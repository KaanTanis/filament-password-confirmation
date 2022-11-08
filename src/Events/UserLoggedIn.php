<?php

namespace KaanTanis\FilamentPasswordConfirmation\Events;

class UserLoggedIn
{
    public function __invoke(): void
    {
        session()->put('auth.filament_password_confirmed_at', time());
    }
}
