<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    public function run(): void
    {
        $doctors = [
            [
                'name' => 'Dr. Farhan Ahmed',
                'email' => 'farhan.doctor@example.com',
                'first_name' => 'Farhan',
                'last_name' => 'Ahmed',
                'phone' => '+8801710000001',
                'gender' => 'Male',
                'department' => 'Cardiology',
                'degrees' => ['MBBS', 'FCPS (Cardiology)'],
                'consultation_fee' => 1000,
            ],
            [
                'name' => 'Dr. Samia Rahman',
                'email' => 'samia.doctor@example.com',
                'first_name' => 'Samia',
                'last_name' => 'Rahman',
                'phone' => '+8801710000002',
                'gender' => 'Female',
                'department' => 'Medicine',
                'degrees' => ['MBBS', 'MD (Internal Medicine)'],
                'consultation_fee' => 800,
            ],
            [
                'name' => 'Dr. Tanvir Hasan',
                'email' => 'tanvir.doctor@example.com',
                'first_name' => 'Tanvir',
                'last_name' => 'Hasan',
                'phone' => '+8801710000003',
                'gender' => 'Male',
                'department' => 'Orthopedics',
                'degrees' => ['MBBS', 'MS (Orthopedics)'],
                'consultation_fee' => 900,
            ],
        ];

        foreach ($doctors as $data) {
            $doctor = User::updateOrCreate(
                ['email' => $data['email']],
                [
                    'name' => $data['name'],
                    'password' => 'password',
                    'role' => 'doctor',
                    'is_admin' => false,
                    'email_verified_at' => now(),
                ]
            );

            Profile::updateOrCreate(
                ['user_id' => $doctor->id],
                [
                    'first_name' => $data['first_name'],
                    'last_name' => $data['last_name'],
                    'phone' => $data['phone'],
                    'gender' => $data['gender'],
                    'address' => 'Dhaka, Bangladesh',
                    'meta' => [
                        'department' => $data['department'],
                        'degrees' => $data['degrees'],
                        'consultation_fee' => $data['consultation_fee'],
                    ],
                ]
            );
        }
    }
}
