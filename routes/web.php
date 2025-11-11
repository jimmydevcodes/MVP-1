<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Auth\Login;
use App\Livewire\Professional\Dashboard;
use App\Livewire\Professional\ClinicalHistories;
use App\Livewire\Professional\Appointments;
use App\Livewire\Professional\Availability;
use App\Livewire\Professional\Settings;
use App\Livewire\Auth\Register;

Route::middleware('guest')->group(function () {
    // Login como componente Livewire (la vista se renderiza con <livewire:auth.login />)
    Route::get('/login', Login::class)->name('login');

    // Registro como componente Livewire
    Route::get('/register', Register::class)->name('register');
});

Route::middleware('auth')->group(function () {
    // Dashboard como componente Livewire
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/professional/clinical-histories', ClinicalHistories::class)->name('professional.clinical_histories');
    Route::get('/professional/appointments', Appointments::class)->name('professional.appointments');
    Route::get('/professional/availability', Availability::class)->name('professional.availability');
    Route::get('/professional/settings', Settings::class)->name('professional.settings');
    Route::post('/logout', [Login::class, 'logout'])->name('logout');

;
});

Route::get('/', fn () => redirect()->route('login'));


// routes/web.php (PARA IR PROBANDO)
Route::get('/mail-test', function () {
    \Illuminate\Support\Facades\Mail::raw('Correo de prueba', function ($m) {
        $m->to('rodrigogalle14@gmail.com')->subject('Test Mail');
    });
    return 'ok';
});
