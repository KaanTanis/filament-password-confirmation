<?php

namespace KaanTanis\FilamentPasswordConfirmation\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\RequirePassword;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\Routing\UrlGenerator;

class PasswordConfirmationMiddleware extends RequirePassword
{
    public function __construct(ResponseFactory $responseFactory, UrlGenerator $urlGenerator)
    {
        parent::__construct($responseFactory, $urlGenerator, config('filament-password-confirmation.timeout'));
    }

    public function handle($request, Closure $next, $redirectToRoute = null, $passwordTimeoutSeconds = null)
    {
        return parent::handle($request, $next, 'filament.password.confirm', $passwordTimeoutSeconds);
    }

    protected function shouldConfirmPassword($request, $passwordTimeoutSeconds = null): bool
    {
        $confirmedAt = time() - $request->session()->get('auth.filament_password_confirmed_at', 0);

        return $confirmedAt > ($passwordTimeoutSeconds ?? $this->passwordTimeout);
    }
}
