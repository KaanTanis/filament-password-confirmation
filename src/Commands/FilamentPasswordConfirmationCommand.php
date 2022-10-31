<?php

namespace KaanTanis\FilamentPasswordConfirmation\Commands;

use Illuminate\Console\Command;

class FilamentPasswordConfirmationCommand extends Command
{
    public $signature = 'filament-password-confirmation';

    public $description = '';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
