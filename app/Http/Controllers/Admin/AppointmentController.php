<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::with(['patient', 'doctor'])
            ->orderBy('appointment_date', 'desc')
            ->paginate(15);
            
        return view('admin.appointments.index', compact('appointments'));
    }

    public function destroy($id)
    {
        Appointment::destroy($id);
        return back()->with('success', 'Appointment deleted.');
    }
}