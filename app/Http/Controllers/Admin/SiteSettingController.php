<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiteSettingController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::all()->pluck('value', 'key')->toArray();

        // Convert stored JSON string values back to native array structures for view parsing
        $specialties = !empty($settings['doctor_specialties']) ? json_decode($settings['doctor_specialties'], true) : [];$customMeta = !empty($settings['custom_meta_fields']) ? json_decode($settings['custom_meta_fields'], true) : [];
 
        return view('admin.settings.index', compact('settings', 'specialties', 'customMeta'));
    }

    public function update(Request $request)
    {
        $validated =$request->validate([
            'site_name'         => 'nullable|string|max:255',
            'site_tagline'      => 'nullable|string|max:255',
            'site_logo'         => 'nullable|image|max:2048',
            'timezone'          => 'nullable|string|max:100',
            'currency_symbol'   => 'nullable|string|max:10',
            'currency_code'     => 'nullable|string|max:10',
            'maintenance_mode'  => 'nullable|boolean',
            'specialties'       => 'nullable|array',
            'specialties.*'     => 'nullable|string|max:255',
            'meta_keys'         => 'nullable|array',
            'meta_values'       => 'nullable|array',
        ]);

        // 1. Handle File Uploads
        if ($request->hasFile('site_logo')) {$existingLogo = SiteSetting::get('site_logo');
            if ($existingLogo && Storage::disk('public')->exists($existingLogo)) {
                Storage::disk('public')->delete($existingLogo);
            }
            $logoPath =$request->file('site_logo')->store('settings', 'public');
            SiteSetting::set('site_logo', $logoPath, 'general', 'string');
        }

        // 2. Handle Doctor Specialties Array
        $specialtiesList = array_values(array_filter($request->input('specialties', [])));
        SiteSetting::set('doctor_specialties', $specialtiesList, 'specialties', 'array');

        // 3. Handle Dynamic Custom Meta Key/Value Pairs
        $metaKeys = $request->input('meta_keys', []);$metaValues = $request->input('meta_values', []);$customMetaArray = [];

        foreach ($metaKeys as $index =>$keyName) {
            if (!empty(trim($keyName))) {$customMetaArray[] = [
                    'key'   => trim($keyName),
                    'value' => $metaValues[$index] ?? '',
                ];
            }
        }
        SiteSetting::set('custom_meta_fields', $customMetaArray, 'custom_meta', 'array');

        // 4. Handle Standard Fields
        $validated['maintenance_mode'] =$request->has('maintenance_mode') ? '1' : '0';

        $standardFields = [
            'site_name'        => ['group' => 'general', 'type' => 'string'],
            'site_tagline'     => ['group' => 'general', 'type' => 'string'],
            'timezone'         => ['group' => 'general', 'type' => 'string'],
            'currency_symbol'  => ['group' => 'general', 'type' => 'string'],
            'currency_code'    => ['group' => 'general', 'type' => 'string'],
            'maintenance_mode' => ['group' => 'general', 'type' => 'boolean'],
        ];

        foreach ($standardFields as $key =>$config) {
            if ($request->has($key) || $key === 'maintenance_mode') {
                SiteSetting::set($key, $validated[$key] ?? null, $config['group'], $config['type']);
            }
        }

        return back()->with('success', 'Settings, Doctor Specialties, and Custom Meta updated successfully.');
    }
}