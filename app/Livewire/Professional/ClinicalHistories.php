<?php

namespace App\Livewire\Professional;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Professional;
use App\Models\ClinicalHistory;

class ClinicalHistories extends Component
{
    use WithPagination;

    public $search = '';
    public $filterProfessional = '';
    public $filterStatus = '';

    protected $queryString = [
        'search' => ['except' => ''],
        'filterProfessional' => ['except' => ''],
        'filterStatus' => ['except' => '']
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $professionals = Professional::with('user')->get();
        
        $histories = ClinicalHistory::query()
            ->with(['patient.user'])
            ->when($this->search, function($query) {
                $query->whereHas('patient.user', function($q) {
                    $q->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('lastname', 'like', '%' . $this->search . '%')
                      ->orWhere('dni', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->filterProfessional, function($query) {
                $query->where('professional_id', $this->filterProfessional);
            })
            ->when($this->filterStatus, function($query) {
                $query->where('status', $this->filterStatus);
            })
            ->latest()
            ->paginate(10);

        return view('livewire.professional.clinical-histories', [
            'histories' => $histories,
            'professionals' => $professionals
        ]);
    }
}