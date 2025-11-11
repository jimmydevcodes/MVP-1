<?php

namespace App\Livewire\Professional;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Schedule;

class Availability extends Component
{
    public $name;
    public $lastname;
    public $specialty;

    public function mount()
    {
        $user = Auth::user();
        $professional = $user->professional;

        $this->name = $user->name;
        $this->lastname = $user->lastname;
        $this->specialty = $professional?->specialty;
    }

    public function render()
    {
        $schedules = Schedule::where('professional_id', Auth::user()->professional->id)
            ->orderBy('day_of_week')
            ->orderBy('start_time')
            ->get();

        return view('livewire.professional.availability', [
            'schedules' => $schedules
        ]);
    }
}