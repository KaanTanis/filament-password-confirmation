<?php

namespace KaanTanis\FilamentPasswordConfirmation\Http\Livewire\Auth;

use DanHarrin\LivewireRateLimiting\WithRateLimiting;
use Filament\Forms\ComponentContainer;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

/**
 * @property ComponentContainer $form
 */
class PasswordConfirmation extends Component implements HasForms
{
    use InteractsWithForms;
    use WithRateLimiting;

    public $password = '';

    public function mount()
    {
        $this->form->fill();
    }

    public function authenticate(Request $request)
    {
        $data = $this->form->getState();

        if (! Hash::check($data['password'], $request->user()->password)) {
            throw ValidationException::withMessages([
                'password' => __('The provided password does not match your current password.'),
            ]);
        }

        $request->session()->passwordConfirmed();

        return redirect()->intended();
    }

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('password')
                ->label(__('filament-password-confirmation::filament-password-confirmation.password.label'))
                ->type('password')
                ->required(),
        ];
    }

    public function render(): View
    {
        return view('filament-password-confirmation::password-confirmation')
            ->layout('filament::components.layouts.card', [
                'title' => __('filament-password-confirmation::filament-password-confirmation.confirm.password'),
            ]);
    }
}
