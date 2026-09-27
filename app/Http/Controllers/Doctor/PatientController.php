<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    public function index()
    {
        // Find all users who are patients AND have an appointment with this doctor
        // $patients = Appointment::where('doctor_id', Auth::id())
        //     ->with([
        //         'patient.profile' 
        //     ])
        //     ->orderBy('created_at', 'desc')
        //     ->get();

         $patients = User::where('role', 'patient')
            ->whereHas('appointments', function ($query) {
                // Only check appointments belonging to the logged-in doctor
                $query->where('doctor_id', Auth::id());
            })
            ->with('profile') // Load the unified profile data (name, age, etc.)
            ->withCount([
                // This magically creates a $patient->total_appointments variable!
                'appointments as total_appointments' => function ($query) {
                    $query->where('doctor_id', Auth::id());
                }
            ])
            ->orderByDesc('total_appointments')
            ->paginate(100);
//             echo '<pre>';
// print_r($patients->patient).'<br>';
// echo '</pre>';
        

        return view('doctor.patients.index', compact('patients'));
    }
}