<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id', 'doctor_id', 'appointment_date', 
        'appointment_time', 'status', 'reason', 'extra'
    ];

   

    // Relationship: An appointment belongs to a patient (User)
    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }

    // Relationship: An appointment belongs to a doctor (User)
    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }

    public function prescriptions()
    {
        return $this->hasMany(Prescription::class);
    }
}