<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentTemplate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'structure',
        'professional_id',
        'is_custom'
    ];

    protected $casts = [
        'structure' => 'json',
        'is_custom' => 'boolean'
    ];

    public function professional()
    {
        return $this->belongsTo(Professional::class);
    }

    public function clinicalHistories()
    {
        return $this->hasMany(ClinicalHistory::class, 'template_id');
    }
}
