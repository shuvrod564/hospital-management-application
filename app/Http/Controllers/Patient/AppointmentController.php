<?php
namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Prescription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    // public function index()
    // {
    //     $appointments = Appointment::where('patient_id', Auth::id())
    //         ->with('doctor')
    //         ->orderBy('appointment_date', 'desc')
    //         ->paginate(10);
    //     $prescriptions = Prescription::where('patient_id', Auth::id())
    //         ->with('doctor');
            
    //     return view('patient.appointments.index', compact(['appointments','prescriptions']));
    // }

    public function index()
    {
        // This fetches everything in 1 query. You can access prescriptions via $appt->prescriptions in the view.
        $appointments = Appointment::where('patient_id', Auth::id())
            ->with([
                'doctor.profile',     // Loads the doctor and their meta profile data
                'prescriptions'       // Loads all prescriptions attached to this appointment
            ])
            ->orderBy('appointment_date', 'desc')
            ->paginate(10);
            
        return view('patient.appointments.index', compact('appointments'));
 
    }

    public function create()
    {
        $doctors = User::where('role', 'doctor')->get();
        return view('patient.appointments.create', compact('doctors'));
    }

    public function store(Request $request)
    { 
        $request->validate([
            'doctor_id' => 'required|exists:users,id',
            'appointment_date' => 'required|date|after:today',
            'appointment_time' => 'required',
            'reason' => 'required|string|max:255',
        ]);

        Appointment::create([
            'patient_id' => Auth::id(),
            'doctor_id' => $request->doctor_id,
            'appointment_date' => $request->appointment_date,
            'appointment_time' => $request->appointment_time,
            'reason' => $request->reason,
            'status' => 'pending',
        ]);

        return redirect()->route('user.appointments.index')->with('success', 'Appointment booked successfully!');
    }

    public function cancel($id)
    {
        $appointment = Appointment::where('id', $id)
            ->where('patient_id', Auth::id())
            ->where('status', 'pending')
            ->firstOrFail();

        $appointment->update(['status' => 'cancelled']);
        return back()->with('success', 'Appointment cancelled.');
    }
}