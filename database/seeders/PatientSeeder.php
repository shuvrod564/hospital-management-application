<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    public function run(): void
    {
        $patients = [
            [
                'name' => 'Rahim Uddin', 'email' => 'rahim@example.com',
                'first_name' => 'Rahim', 'last_name' => 'Uddin',
                'phone' => '+8801810000001', 'gender' => 'Male',
                'meta' => ['blood_group' => 'B+', 'allergies' => []],
            ],
            [
                'name' => 'Ayesha Khan', 'email' => 'ayesha@example.com',
                'first_name' => 'Ayesha', 'last_name' => 'Khan',
                'phone' => '+8801810000002', 'gender' => 'Female',
                'meta' => ['blood_group' => 'A+', 'allergies' => ['Dust']],
            ],
            [
                'name' => 'Karim Ahmed', 'email' => 'karim@example.com',
                'first_name' => 'Karim', 'last_name' => 'Ahmed',
                'phone' => '+8801810000003', 'gender' => 'Male',
                'meta' => ['blood_group' => 'O+', 'allergies' => []],
            ],
            [
                'name' => 'Nusrat Jahan', 'email' => 'nusrat@example.com',
                'first_name' => 'Nusrat', 'last_name' => 'Jahan',
                'phone' => '+8801810000004', 'gender' => 'Female',
                'meta' => ['blood_group' => 'AB+', 'allergies' => []],
            ],
            [
                'name' => 'Hasan Mahmud', 'email' => 'hasan@example.com',
                'first_name' => 'Hasan', 'last_name' => 'Mahmud',
                'phone' => '+8801810000005', 'gender' => 'Male',
                'meta' => ['blood_group' => 'A-', 'allergies' => ['Penicillin']],
            ],
        ];

        foreach ($patients as $data) {
            $patient = User::updateOrCreate(
                ['email' => $data['email']],
                [
                    'name' => $data['name'],
                    'password' => 'password',
                    'role' => 'patient',
                    'is_admin' => false,
                    'email_verified_at' => now(),
                ]
            );

            Profile::updateOrCreate(
                ['user_id' => $patient->id],
                [
                    'first_name' => $data['first_name'],
                    'last_name' => $data['last_name'],
                    'phone' => $data['phone'],
                    'gender' => $data['gender'],
                    'address' => 'Dhaka, Bangladesh',
                    'meta' => $data['meta'],
                ]
            );
        }
    }
}
