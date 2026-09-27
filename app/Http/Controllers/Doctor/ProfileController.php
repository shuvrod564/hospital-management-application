<?php
namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\User;
use App\Models\SiteSetting;

class ProfileController extends Controller
{
    public function index()
    {   
        $profile = Profile::firstOrCreate(['user_id' => Auth::id()]);
        $doctor_email = User::where(['id' => Auth::id()])
                    ->pluck('email') 
                    ->first(); 
                    
        return view('doctor.profile.index', compact('profile', 'doctor_email'));
    } 

    public function manage()
    {  
        // Load existing profile or create a blank one
        $profile = Profile::firstOrCreate(['user_id' => Auth::id()]); 
        $doctor_email = User::where(['id' => Auth::id()])
                    ->pluck('email') 
                    ->first(); 
        // Check spelling: 'specialties' vs 'specialities'
        $setting = SiteSetting::where('group', 'specialties')->where('key', 'doctor_specialties')->first();
        $specialities = $setting ? json_decode($setting->value, true) : [];
 

        return view('doctor.profile.manage', compact('profile', 'doctor_email', 'specialities'));
    } 


     public function update(Request $request)
    {
        // 1. Validate the massive form
        $validated = $request->validate([
            // Common Fields
            'first_name'                 => 'required|string|max:255',
            'last_name'                 => 'required|string|max:255',
            'avater'                    => 'nullable|image|max:2048',
            'preferred_name'            => 'nullable|string|max:255',
            'date_of_birth'             => 'required|date',
            'age'                       => 'nullable|integer|min:0',
            'gender'                    => 'required|in:male,female,non-binary,other,prefer_not_to_say',
            'phone'                     => 'required|string|max:20',
            'email'                     => 'nullable|email',
            'address'                   => 'required|string',
            'emergency_name'            => 'required|string',
            'emergency_relationship'    => 'required|string',
            'emergency_phone'           => 'required|string',
            
            // Doctor-Specific Fields
            'pediatric_cardiology_fields' => 'nullable|string',
            'pediatric_focus_areas'       => 'nullable|string',
            'degrees'                     => 'required|array',
            'board_certifications'        => 'nullable|string',
            'registration_number'         => 'required|string',
            'years_in_practice'           => 'required|integer|min:0',
            'past_internships'            => 'nullable|string',
            'historical_affiliations'     => 'nullable|string',
            'initial_fee'                 => 'required|numeric|min:0',
            'followup_fee'                => 'required|numeric|min:0',
            'chamber_address'             => 'required|string',
            'map_coordinates'             => 'nullable|string',
            'available_days'              => 'nullable|array',
            'work_start_time'             => 'nullable|date_format:H:i',
            'work_end_time'               => 'nullable|date_format:H:i',
            'off_days_description'        => 'nullable|string',
            'mock_rating'                 => 'nullable|numeric',
            'bedside_manner_rating'       => 'nullable|string',
            'feedback_logs_summary'       => 'nullable|string',
        ]); 

        $user = Auth::user();
        $profile = $user->profile ?? new Profile();
        $profile->user_id = $user->id; 

        $profile_avater = null;
        // Process Main Category Image
        if ($request->hasFile('avater')) {
            $profile_avater = $request->file('avater')->store('doctors', 'public');
        }

        // 2. Save Common Fields to standard columns
        $profile->first_name   = $validated['first_name'];
        $profile->last_name   = $validated['last_name'];
        $profile->avatar   = $profile_avater;
        $profile->phone        = $validated['phone'];
        $profile->date_of_birth = $validated['date_of_birth'];
        $profile->gender       = $validated['gender'];
        $profile->address      = $validated['address']; 

        // 3. Package Doctor-Specific Fields into the 'meta' JSON column
        $meta = [
            // Basic Extra
            'preferred_name'         => $validated['preferred_name'],
            'age'                    => $validated['age'],
            'dob'                    => $validated['date_of_birth'],
            'email'                  => $validated['email'], 
            'emergency_name'         => $validated['emergency_name'],
            'emergency_relationship' => $validated['emergency_relationship'],
            'emergency_phone'        => $validated['emergency_phone'],

            // Specialties
            'department' => $validated['pediatric_cardiology_fields'],
            'pediatric_focus_areas'       => $validated['pediatric_focus_areas'],

            // Credentials
            'degrees'                => $validated['degrees'],
            'board_certifications'   => $validated['board_certifications'],
            'registration_number'    => $validated['registration_number'],

            // Experience
            'years_in_practice'      => $validated['years_in_practice'],
            'past_internships'       => $validated['past_internships'],
            'historical_affiliations'=> $validated['historical_affiliations'],

            // Consultation
            'initial_fee'            => $validated['initial_fee'],
            'followup_fee'           => $validated['followup_fee'],

            // Chamber
            'chamber_address'        => $validated['chamber_address'],
            'map_coordinates'        => $validated['map_coordinates'],

            // Availability
            'available_days'         => $validated['available_days'],
            'work_start_time'        => $validated['work_start_time'],
            'work_end_time'          => $validated['work_end_time'],
            'off_days_description'   => $validated['off_days_description'],

            // Feedback/Metrics
            'mock_rating'            => $validated['mock_rating'],
            'bedside_manner_rating'  => $validated['bedside_manner_rating'],
            'feedback_logs_summary'  => $validated['feedback_logs_summary'],
        ];

        $profile->meta = $meta; // Laravel automatically encodes this array to JSON

        // 4. Save to database
        $profile->save();

        return back()->with('success', 'Doctor profile synced and updated successfully!');
    }
}