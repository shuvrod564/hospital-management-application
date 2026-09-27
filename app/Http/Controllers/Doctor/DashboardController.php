<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Get today's date in Y-m-d format to match the database
        $today = Carbon::today()->toDateString();

        // Fetch appointments for today
        $todayAppointments = Appointment::where('doctor_id', Auth::id())
            ->where('appointment_date', $today)
            ->whereNotIn('status', ['cancelled']) // Don't show cancelled appointments on dashboard
            ->with([
                'patient.profile', // Load patient's name, age, etc. from the unified profile table
                'prescriptions'    // Check if a prescription was already written today
            ])
            ->orderBy('appointment_time', 'asc') // Sort from morning to evening
            ->get();

        // Optional: Get some quick stats for the top of the dashboard
        $totalToday = $todayAppointments->count();
        $pendingToday = $todayAppointments->where('status', 'pending')->count();
        $completedToday = $todayAppointments->where('status', 'completed')->count();

        return view('doctor.dashboard', compact(
            'todayAppointments', 
            'totalToday', 
            'pendingToday', 
            'completedToday'
        ));
    }
}