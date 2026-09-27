<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin User',
                'password' => 'password',
                'role' => 'admin',
                'is_admin' => true,
                'email_verified_at' => now(),
            ]
        );

        Profile::updateOrCreate(
            ['user_id' => $admin->id],
            [
                'first_name' => 'Admin',
                'last_name' => 'User',
                'phone' => '+8801700000001',
                'gender' => 'Other',
                'address' => 'Dhaka, Bangladesh',
                'meta' => ['title' => 'System Administrator'],
            ]
        );
    }
}
