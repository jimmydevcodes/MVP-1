<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClinicalHistory extends Model
{
    use HasFactory;

    protected $table = 'clinical_histories';

    protected $fillable = [
        'patient_id',
        'professional_id',
        'template_id',
        'appointment_date',
        'consultation_reason',
        'personal_history',
        'family_history',
        'diagnosis',
        'treatment_plan',
        'therapeutic_progress',
        'document_type',
        'attached_file',
        'status',
        'content'
    ];

    protected $casts = [
        'appointment_date' => 'date',
        'content' => 'json',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function professional()
    {
        return $this->belongsTo(Professional::class);
    }

    public function template()
    {
        return $this->belongsTo(DocumentTemplate::class, 'template_id');
    }
}
