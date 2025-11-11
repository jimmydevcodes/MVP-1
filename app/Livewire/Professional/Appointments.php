<?php

namespace App\Livewire\Professional;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;

class Appointments extends Component
{
    use WithPagination;

    // Propiedades para filtros
    public $search = '';
    public $dateFilter = '';
    public $statusFilter = '';

    // Propiedades para el queryString (URL)
    protected $queryString = [
        'search' => ['except' => ''],
        'dateFilter' => ['except' => ''],
        'statusFilter' => ['except' => '']
    ];

    // Resetear la paginación cuando se busca
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $user = Auth::user();
        $professional = $user->professional;

        if (!$professional) {
            return view('livewire.professional.appointments', [
                'appointments' => collect([]),
                'error' => 'No tienes un perfil profesional configurado. Por favor, contacta al administrador.'
            ]);
        }

        $appointments = Appointment::query()
            ->where('professional_id', $professional->id)
            ->with(['patient.user'])
            ->when($this->search, function($query) {
                $query->whereHas('patient.user', function($q) {
                    $q->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('lastname', 'like', '%' . $this->search . '%')
                      ->orWhere('dni', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->dateFilter, function($query) {
                $query->whereDate('appointment_date', $this->dateFilter);
            })
            ->when($this->statusFilter, function($query) {
                $query->where('status', $this->statusFilter);
            })
            ->orderBy('appointment_date', 'desc')
            ->paginate(10);

        return view('livewire.professional.appointments', [
            'appointments' => $appointments
        ]);
    }
}