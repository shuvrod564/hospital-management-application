<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    protected $fillable = [
        'appointment_id', 'vitals', 'complaints', 'diagnosis', 
        'medications', 'advice', 'investigations', 'follow_up_date'
    ];

    // Automatically encode/decode arrays to JSON
    protected $casts = [
        'vitals' => 'array',
        'medications' => 'array',
        'follow_up_date' => 'date',
    ];

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }

    public function prescriptions()
    {
        return $this->hasMany(Prescription::class);
    }
 
}