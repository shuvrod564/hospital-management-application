<?php
namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Profile;
use App\Models\Prescription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
   
    public function index()
    { 
        $appointments = Appointment::where('doctor_id', Auth::id())
            ->with([
                'patient.profile',     // Loads the doctor and their meta profile data
                'prescriptions'       // Loads all prescriptions attached to this appointment
            ])
            ->orderBy('appointment_date', 'desc')
            ->paginate(10);
            
        return view('doctor.appointments.index', compact('appointments'));
 
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate(['status' => 'required|in:confirmed,completed,cancelled']);
        
        $appointment = Appointment::where('id', $id)
            ->where('doctor_id', Auth::id())
            ->firstOrFail();

        $appointment->update(['status' => $request->status]);
        return back()->with('success', 'Appointment status updated.');
    }

    public function prescription(Request $request, $appointmentId)
    { 
        // set doctor infos 
        // $data = $appointments = Appointment::where('doctor_id', Auth::id())
        //     ->with('patient')
        //     ->where('id', $id)
        //     ->firstorFail();
        // $doctor = Profile::firstOrCreate(['user_id' => Auth::id()]); 
        // $patient = Profile::firstOrCreate(['user_id' => $data->patient_id]); 
        
        $appointment = Appointment::where('id', $appointmentId)
            ->where('doctor_id', Auth::id())
            ->with(['patient.profile', 'doctor.profile']) // Load profiles
            ->firstOrFail(); 

        return view('doctor.appointments.prescription', [
            'appointment' => $appointment,
            'patient' => $appointment->patient,
            'doctor' => $appointment->doctor,
        ]);

        // return view('doctor.appointments.prescription', compact(['doctor', 'patient']));
    }


    // Handle the form submission
    public function storePrescription(Request $request, $appointmentId)
    {
        // 1. Validate the incoming data
        $validated = $request->validate([
            'vitals'               => 'nullable|array',
            'vitals.bp'            => 'nullable|string|max:20',
            'vitals.weight'        => 'nullable|numeric',
            'complaints'           => 'nullable|string',
            'diagnosis'            => 'nullable|string',
            'medications'          => 'required|array|min:1',
            'medications.*.name'       => 'required|string',
            'medications.*.frequency'  => 'required|string',
            'medications.*.timing'     => 'nullable|string',
            'medications.*.duration'   => 'required|string',
            'advice'               => 'nullable|string',
            'investigations'      => 'nullable|string',
            'follow_up_date'      => 'nullable|date|after:today',
        ]);

        // 2. Verify the appointment belongs to this doctor
        $appointment = Appointment::where('id', $appointmentId)
            ->where('doctor_id', Auth::id())
            ->firstOrFail();

        // 3. Create the prescription record
        Prescription::create([
            'appointment_id' => $appointment->id,
            'vitals'        => $validated['vitals'],
            'complaints'    => $validated['complaints'],
            'diagnosis'     => $validated['diagnosis'],
            'medications'   => $validated['medications'], // Laravel automatically JSON encodes this
            'advice'        => $validated['advice'],
            'investigations'=> $validated['investigations'],
            'follow_up_date'=> $validated['follow_up_date'],
        ]);

        // Optional: Update the appointment status to 'completed' or 'prescribed'
        // $appointment->update(['status' => 'prescribed']);

        return redirect()->route('doctor.appointments.index')
            ->with('success', 'Prescription generated successfully!');
    }


    // NEW: Show the prescription details
    public function showPrescription($prescriptionId)
    {
        $prescription = Prescription::where('id', $prescriptionId)
            ->whereHas('appointment', function ($query) {
                // Security check: Ensure this prescription belongs to a doctor's appointment
                $query->where('doctor_id', Auth::id());
            })
            ->with(['appointment.patient.profile', 'appointment.doctor.profile'])
            ->firstOrFail();

        
            

        // return view('doctor.appointments.show_precription', compact('prescription'));
        return view('doctor.appointments.show_precription', [
            'prescription' => $prescription, 
        ]);
    }
}