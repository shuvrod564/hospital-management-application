<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            // General Settings
            ['group' => 'general', 'key' => 'site_name', 'value' => 'HMS Hospital', 'type' => 'string'],
            ['group' => 'general', 'key' => 'site_tagline', 'value' => 'Advanced Healthcare Management', 'type' => 'string'],
            ['group' => 'general', 'key' => 'site_logo', 'value' => null, 'type' => 'string'],
            ['group' => 'general', 'key' => 'timezone', 'value' => 'UTC', 'type' => 'string'],
            ['group' => 'general', 'key' => 'currency_symbol', 'value' => '$', 'type' => 'string'],
            ['group' => 'general', 'key' => 'currency_code', 'value' => 'USD', 'type' => 'string'],
            ['group' => 'general', 'key' => 'maintenance_mode', 'value' => '0', 'type' => 'boolean'],

            // Doctor Specialties Master List
            ['group' => 'specialties', 'key' => 'doctor_specialties', 'value' => json_encode([
                'Cardiology', 'Neurology', 'Dermatology', 'Orthopedics', 
                'Pediatrics', 'Ophthalmology', 'Dental', 'Pulmonology'
            ]), 'type' => 'array'],

            // Flexible Dynamic Settings (Future Extensibility)
            ['group' => 'custom_meta', 'key' => 'custom_meta_fields', 'value' => json_encode([
                ['key' => 'google_analytics_id', 'value' => 'UA-12345678-1'],
                ['key' => 'patient_portal_notice', 'value' => 'Welcome to our clinic portal.'],
            ]), 'type' => 'array'],
        ];

        foreach ($settings as$setting) {
            SiteSetting::updateOrCreate(['key' => $setting['key']],$setting);
        }
    }
}