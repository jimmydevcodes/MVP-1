<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app')]
class Login extends Component
{
    public $email = '';
    public $password = '';
    public $remember = false;

    protected $rules = [
        'email' => ['required', 'email'],
        'password' => ['required', 'min:6'],
    ];

    public function login()
    {
        $credentials = $this->validate();

        if (Auth::attempt($credentials, $this->remember)) {
            session()->regenerate();
            Log::info('Login successful', ['user' => Auth::user()->email]);
            return redirect()->intended(route('dashboard'));
        }

        $this->addError('email', 'Las credenciales no son válidas.');
    }

    public function render()
    {
        return view('livewire.auth.login');
    }

    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect('/');
    }
}
