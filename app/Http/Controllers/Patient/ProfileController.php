<?php
namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {  
        $profile = Profile::firstOrCreate(['user_id' => Auth::id()]);
        return view('patient.profile.index', compact('profile')); 
    } 

    public function manage()
    {
        $user = User::where('id', Auth::id())->first();
        $profile = Profile::firstOrCreate(['user_id' => Auth::id()]);
        print_r($user);
        return view('patient.profile.manage', compact('profile')); 
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            // Standard
            'full_name' => 'required|string|max:255',
            'dob' => 'required|date',
            'gender' => 'required|in:male,female,non-binary,other,prefer_not_to_say',
            'phone' => 'required|string|max:20',
            'email' => 'required|email',
            'address' => 'required|string',
            
            // Meta - Personal
            'preferred_name' => 'nullable|string',
            'age' => 'nullable|integer|min:0',
            'emergency_name' => 'required|string',
            'emergency_relationship' => 'required|string',
            'emergency_phone' => 'required|string',
            
            // Meta - Insurance
            'insurance_provider' => 'nullable|string',
            'policy_number' => 'nullable|string',
            'group_number' => 'nullable|string',
            'subscriber_name' => 'nullable|string',
            'billing_status' => 'nullable|string',
            
            // Meta - Clinical
            'pcp_name' => 'nullable|string',
            'allergies' => 'nullable|string',
            'chronic_conditions' => 'nullable|string',
            'current_medications' => 'nullable|string',
            'past_surgeries' => 'nullable|string',
            'family_history' => 'nullable|string',
            'social_history' => 'nullable|string',
            
            // Meta - Appointments
            'upcoming_appointment_datetime' => 'nullable|date_format:Y-m-d\TH:i',
            'upcoming_appointment_provider' => 'nullable|string',
            'hipaa_consent' => 'required|accepted', // Must be checked
            'medical_reports' => 'nullable|array',
            'medical_reports.*' => 'file|mimes:pdf,jpg,jpeg,png,doc,docx|max:5120', // 5MB max per file
            
            // Meta - Settings
            'notifications' => 'nullable|array',
            'preferred_language' => 'nullable|string',
            'linked_profiles' => 'nullable|string',
        ]);

        $profile = Auth::user()->profile ?? new Profile();
        $profile->user_id = Auth::id();

        $profile_avater = null;
        // Process Main Category Image
        if ($request->hasFile('avater')) {
            $profile_avater = $request->file('avater')->store('user', 'public');
        }

        // 1. Assign Standard Columns
        $profile->first_name = $validated['full_name'];
        $profile->avatar   = $profile_avater;
        $profile->phone = $validated['phone'];
        $profile->date_of_birth = $validated['dob'];
        $profile->gender = $validated['gender'];
        $profile->address = $validated['address'];

        // 2. Handle File Uploads (Append to existing)
        $existingReports = $profile->getMeta('medical_reports', []);
        if ($request->hasFile('medical_reports')) {
            foreach ($request->file('medical_reports') as $file) {
                $existingReports[] = $file->store('patient_reports/' . Auth::id(), 'public');
            }
        }

        // 3. Build Meta Array
        $meta = [
            'preferred_name' => $validated['preferred_name'],
            'age' => $validated['age'],
            'blood_group' => $request->blood_group,
            'email' => $validated['email'],
            'emergency_name' => $validated['emergency_name'],
            'emergency_relationship' => $validated['emergency_relationship'],
            'emergency_phone' => $validated['emergency_phone'],
            
            'insurance_provider' => $validated['insurance_provider'],
            'policy_number' => $validated['policy_number'],
            'group_number' => $validated['group_number'],
            'subscriber_name' => $validated['subscriber_name'],
            'billing_status' => $validated['billing_status'],
            
            'pcp_name' => $validated['pcp_name'],
            'allergies' => $validated['allergies'],
            'chronic_conditions' => $validated['chronic_conditions'],
            'current_medications' => $validated['current_medications'],
            'past_surgeries' => $validated['past_surgeries'],
            'family_history' => $validated['family_history'],
            'social_history' => $validated['social_history'],
            
            'upcoming_appointment_datetime' => $validated['upcoming_appointment_datetime'],
            'upcoming_appointment_provider' => $validated['upcoming_appointment_provider'],
            'hipaa_consent' => $validated['hipaa_consent'],
            'medical_reports' => $existingReports,
            
            'notifications' => $validated['notifications'],
            'preferred_language' => $validated['preferred_language'],
            'linked_profiles' => $validated['linked_profiles'],
        ];

        $profile->meta = $meta;
        $profile->save();

        return back()->with('success', 'Patient profile saved successfully!');
    }
}