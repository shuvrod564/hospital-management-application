<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Database\Seeder;

class AppointmentSeeder extends Seeder
{
    public function run(): void
    {
        $doctorIds = User::where('role', 'doctor')->orderBy('id')->pluck('id')->values();
        $patients = [
            ['email' => 'rahim@example.com', 'date' => 1, 'time' => '10:00:00', 'status' => 'confirmed', 'reason' => 'Chest pain consultation', 'department' => 'Cardiology'],
            ['email' => 'ayesha@example.com', 'date' => 2, 'time' => '11:30:00', 'status' => 'pending', 'reason' => 'Fever and weakness', 'department' => 'Medicine'],
            ['email' => 'karim@example.com', 'date' => 3, 'time' => '15:00:00', 'status' => 'confirmed', 'reason' => 'Knee pain', 'department' => 'Orthopedics'],
            ['email' => 'nusrat@example.com', 'date' => -2, 'time' => '12:15:00', 'status' => 'completed', 'reason' => 'Routine checkup', 'department' => 'Gynecology'],
            ['email' => 'hasan@example.com', 'date' => 5, 'time' => '16:30:00', 'status' => 'cancelled', 'reason' => 'Headache consultation', 'department' => 'Neurology'],
        ];

        if ($doctorIds->isEmpty()) {
            $this->command?->warn('No doctors found; run DoctorSeeder before AppointmentSeeder.');
            return;
        }

        foreach ($patients as $index => $data) {
            $patient = User::where('email', $data['email'])->first();
            if (!$patient) {
                $this->command?->warn("Patient {$data['email']} not found; skipping appointment.");
                continue;
            }

            Appointment::updateOrCreate(
                [
                    'patient_id' => $patient->id,
                    'doctor_id' => $doctorIds[$index % $doctorIds->count()],
                    'appointment_date' => now()->addDays($data['date'])->toDateString(),
                    'appointment_time' => $data['time'],
                ],
                [
                    'status' => $data['status'],
                    'reason' => $data['reason'],
                    'extra' => ['department' => $data['department']],
                ]
            );
        }
    }
}
