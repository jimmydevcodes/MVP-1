<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'professional_id',
        'patient_id',
        'date',
        'start_time',
        'end_time',
        'modality',
        'location',
        'status'
    ];

    protected $casts = [
        'date' => 'date',
        'start_time' => 'datetime',
        'end_time' => 'datetime'
    ];

    public function professional()
    {
        return $this->belongsTo(Professional::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
