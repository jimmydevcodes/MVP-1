<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Services\ReniecService;
use App\Services\LocationService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\Professional;

#[Layout('components.layouts.guest')]
class Register extends Component
{
    public $name = '';
    public $lastname = '';
    public $email = '';
    public $dni = '';
    public $carnet_extrangeria = '';
    public $date_of_birth = '';
    public $phone = '';
    public $address = '';
    public $country = '';
    public $city = '';
    public $postal_code = '';
    public $specialty = '';
    public $license_number = '';
    public $password = '';
    public $password_confirmation = '';
    public $terms = false;

    public $countries = [];
    public $states = [];
    public $cities = [];
    public $selectedCountry = null;
    public $selectedState = null;
    public $selectedCity = null;

    protected $reniecService;
    protected $locationService;

    public function boot(ReniecService $reniecService, LocationService $locationService): void
    {
        $this->reniecService = $reniecService;
        $this->locationService = $locationService;
    }

    public function mount(): void
    {
        Log::info('Register component mounted');
        $this->loadCountries();
    }

    public function loadCountries(): void
    {
        Log::info('Loading countries');
        $this->countries = $this->locationService->getCountries();
        Log::info('Countries loaded', [
            'count' => count($this->countries),
            'sample' => array_slice($this->countries, 0, 1),
        ]);
    }

    private function syncCountry(?string $value): void
    {
        Log::info('Country selected (sync)', ['country' => $value]);

        // Reset dependientes
        $this->reset(['states', 'cities', 'selectedState', 'selectedCity', 'city']);

        if (!$value) {
            $this->country = '';
            return;
        }

        try {
            Log::info('Fetching states for country', ['country' => $value]);
            $this->states = $this->locationService->getStates($value);

            Log::info('States loaded', [
                'count' => count($this->states),
                'sample' => array_slice($this->states, 0, 1),
            ]);

            // Guardar nombre legible del país
            $selectedCountry = collect($this->countries)->firstWhere('iso2', $value);
            $this->country = $selectedCountry['name'] ?? '';

            Log::info('Country field updated', ['value' => $this->country]);
        } catch (\Exception $e) {
            Log::error('Error loading states', [
                'country' => $value,
                'error' => $e->getMessage(),
            ]);
            $this->states = [];
        }
    }

    public function updatedSelectedCountry($value): void
    {
        $this->syncCountry($value);
    }

    public function getStates(): void
    {
        if ($this->selectedCountry) {
            Log::info('Manual state fetch', ['country' => $this->selectedCountry]);
            $this->syncCountry($this->selectedCountry);
        }
    }

    public function updatedSelectedState($value): void
    {
        Log::info('State selected', [
            'country' => $this->selectedCountry,
            'state' => $value,
        ]);

        $this->cities = [];
        $this->selectedCity = null;
        $this->city = '';

        if ($this->selectedCountry && $value) {
            $this->cities = $this->locationService->getCities($this->selectedCountry, $value);
            Log::info('Cities loaded', [
                'count' => count($this->cities),
                'sample' => array_slice($this->cities, 0, 1),
            ]);
        }
    }

    public function updatedSelectedCity($value): void
    {
        Log::info('City selected', ['value' => $value]);
        if ($value) {
            $selectedCity = collect($this->cities)->firstWhere('name', $value);
            $this->city = $selectedCity['name'] ?? '';
        } else {
            $this->city = '';
        }
    }

    public function searchDNI(): void
    {
        if (preg_match('/^\d{8}$/', $this->dni ?? '')) {
            $person = $this->reniecService->getPersonByDNI($this->dni);
            if ($person) {
                $this->name = $person['nombres'] ?? '';
                $this->lastname = $person['apellidos'] ?? '';
            }
        }
    }

    public function register()
    {
        $request = new RegisterRequest();
        $validated = $this->validate($request->rules(), $request->messages(), $request->attributes());

        $user = User::create([
            'name'               => ucwords(strtolower(trim($validated['name']))),
            'lastname'           => ucwords(strtolower(trim($validated['lastname']))),
            'email'              => strtolower(trim($validated['email'])), // <- sin paréntesis extra
            'dni'                => $validated['dni'] ? preg_replace('/\s+/', '', $validated['dni']) : null,
            'carnet_extrangeria' => $validated['carnet_extrangeria'] ? preg_replace('/\s+/', '', $validated['carnet_extrangeria']) : null,
            'date_of_birth'      => $validated['date_of_birth'],
            'phone'              => preg_replace('/\s+/', '', $validated['phone']),
            'address'            => $validated['address'],
            'country'            => ucwords(strtolower(trim($validated['country']))),
            'city'               => ucwords(strtolower(trim($validated['city']))),
            'postal_code'        => preg_replace('/\s+/', '', $validated['postal_code']),
            'specialty'          => $validated['specialty'],
            'password'           => Hash::make($validated['password']),
        ]);
        $professional = Professional::create([
            'user_id' => $user->id,
            'specialty' => $validated['specialty'],
            'license_number' => $validated['license_number'],
            'is_active' => true
        ]);

        Auth::guard('web')->login($user);

        return redirect()->intended(route('dashboard'));
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
