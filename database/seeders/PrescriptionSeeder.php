<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Prescription;
use Illuminate\Database\Seeder;

class PrescriptionSeeder extends Seeder
{
    public function run(): void
    {
        $completedAppointments = Appointment::where('status', 'completed')->orderBy('id')->get();

        foreach ($completedAppointments as $appointment) {
            Prescription::updateOrCreate(
                ['appointment_id' => $appointment->id],
                [
                    'vitals' => ['bp' => '120/80', 'pulse' => 76, 'temperature_c' => 36.8, 'weight_kg' => 65],
                    'complaints' => 'Routine follow-up; no acute complaints reported.',
                    'diagnosis' => 'Routine health assessment',
                    'medications' => [
                        ['name' => 'Example medication', 'dosage' => 'As directed', 'frequency' => 'As directed', 'duration' => 'As prescribed'],
                    ],
                    'advice' => 'Maintain a balanced diet, hydration, and regular exercise.',
                    'investigations' => 'No investigations recorded.',
                    'follow_up_date' => now()->addMonths(3)->toDateString(),
                ]
            );
        }
    }
}
