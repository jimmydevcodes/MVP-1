<?php

namespace App\Livewire\Professional;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Settings extends Component
{
    public $name;
    public $lastname;
    public $email;
    public $phone;
    public $specialty;
    public $license;
    public $emailNotifications = false;
    public $timezone;
    public $currentPassword;
    public $newPassword;
    public $newPasswordConfirmation;

    public function mount()
    {
        $user = Auth::user();
        $professional = $user->professional;

        $this->name = $user->name;
        $this->lastname = $user->lastname;
        $this->email = $user->email;
        $this->phone = $user->phone;
        $this->specialty = $professional?->specialty;
        $this->license = $professional?->license_number;
        $this->timezone = $user->timezone ?? 'America/Lima';
        $this->emailNotifications = $user->email_notifications ?? false;
    }

    public function saveProfile()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'phone' => 'required|string|max:20',
            'specialty' => 'required|string',
            'license' => 'required|string|max:20',
        ]);

        $user = Auth::user();
        $user->update([
            'name' => $this->name,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'phone' => $this->phone,
        ]);

        if ($user->professional) {
            $user->professional->update([
                'specialty' => $this->specialty,
                'license_number' => $this->license,
            ]);
        }

        session()->flash('message', 'Perfil actualizado exitosamente.');
    }

    public function savePreferences()
    {
        $user = Auth::user();
        $user->update([
            'timezone' => $this->timezone,
            'email_notifications' => $this->emailNotifications,
        ]);

        session()->flash('message', 'Preferencias actualizadas exitosamente.');
    }

    public function updatePassword()
    {
        $this->validate([
            'currentPassword' => 'required',
            'newPassword' => 'required|min:8|confirmed',
            'newPasswordConfirmation' => 'required'
        ]);

        $user = Auth::user();

        if (!Hash::check($this->currentPassword, $user->password)) {
            $this->addError('currentPassword', 'La contraseña actual no es correcta.');
            return;
        }

        $user->update([
            'password' => Hash::make($this->newPassword)
        ]);

        $this->reset(['currentPassword', 'newPassword', 'newPasswordConfirmation']);
        session()->flash('message', 'Contraseña actualizada exitosamente.');
    }

    public function render()
    {
        return view('livewire.professional.settings');
    }
}