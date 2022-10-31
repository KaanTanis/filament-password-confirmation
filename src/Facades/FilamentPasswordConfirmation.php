<?php

namespace KaanTanis\FilamentPasswordConfirmation\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \KaanTanis\FilamentPasswordConfirmation\FilamentPasswordConfirmation
 */
class FilamentPasswordConfirmation extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \KaanTanis\FilamentPasswordConfirmation\FilamentPasswordConfirmation::class;
    }
}
