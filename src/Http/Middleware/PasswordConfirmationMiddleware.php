<?php

namespace KaanTanis\FilamentPasswordConfirmation\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\RequirePassword;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\Routing\UrlGenerator;

class PasswordConfirmationMiddleware extends RequirePassword
{
    public function __construct(ResponseFactory $responseFactory, UrlGenerator $urlGenerator, $passwordTimeout = null)
    {
        parent::__construct($responseFactory, $urlGenerator, config('filament-password-confirmation.timeout'));
    }

    public function handle($request, Closure $next, $redirectToRoute = null, $passwordTimeoutSeconds = null)
    {
        return parent::handle($request, $next, 'filament.password.confirm', $passwordTimeoutSeconds);
    }
}
