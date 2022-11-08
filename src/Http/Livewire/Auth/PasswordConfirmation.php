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

    /**
     * @var string
     */
    public $password = '';

    /**
     * @return void
     */
    public function mount()
    {
        $this->form->fill();
    }

    /**
     * @param  Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function authenticate(Request $request)
    {
        $data = $this->form->getState();

        /** @phpstan-ignore-next-line */ // @fixme
        if (! Hash::check($data['password'], $request->user()->password)) {
            throw ValidationException::withMessages([
                'password' => __('The provided password does not match your current password.'),
            ]);
        }

        session()->put('auth.filament_password_confirmed_at', time());

        return redirect()->intended();
    }

    /**
     * @return array
     */
    protected function getFormSchema(): array
    {
        return [
            TextInput::make('password')
                ->label(__('filament-password-confirmation::filament-password-confirmation.password.label'))
                ->type('password')
                ->required(),
        ];
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('filament-password-confirmation::password-confirmation')
            ->layout('filament::components.layouts.card', [
                'title' => __('filament-password-confirmation::filament-password-confirmation.confirm.password'),
            ]);
    }
}
