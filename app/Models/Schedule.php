<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'professional_id',
        'day_week',
        'start_time',
        'end_time',
        'status'
    ];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime'
    ];

    public function professional()
    {
        return $this->belongsTo(Professional::class);
    }

    public function absences()
    {
        return $this->hasMany(Absence::class);
    }
}
