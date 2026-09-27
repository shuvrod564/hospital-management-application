<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;

class FindDoctorController extends Controller
{
    public function index(Request $request)
    {
        // 1. Fetch sorted unique specialties directly from database
        $specialties = Profile::whereNotNull('meta->department')
            ->selectRaw("JSON_UNQUOTE(JSON_EXTRACT(meta, '$.department')) as department")
            ->distinct()
            ->orderBy('department', 'asc')
            ->pluck('department')
            ->filter()
            ->values();

        // 2. Build Query for filtered doctors
        $query = User::where('role', 'doctor')
            ->with('profile');

        // Search doctor name
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhereHas('profile', function ($profile) use ($search) {
                        $profile->where('first_name', 'like', "%{$search}%")
                            ->orWhere('last_name', 'like', "%{$search}%");
                    });
            });
        }

        // Filter by specialty
        if ($request->filled('specialty')) {
            $specialty = $request->specialty;

            $query->whereHas('profile', function ($q) use ($specialty) {
                $q->where('meta->department', $specialty);
            });
        }

        // Filter by location
        if ($request->filled('location')) {
            $location = $request->location;

            $query->whereHas('profile', function ($q) use ($location) {
                $q->where('meta->location', $location);
            });
        }

        // Filter by gender
        if ($request->filled('gender')) {
            $query->whereHas('profile', function ($q) use ($request) {
                $q->where('gender', $request->gender);
            });
        }

        // Filter by consultation fee
        if ($request->filled('max_fee')) {
            $query->whereHas('profile', function ($q) use ($request) {
                $q->where('meta->consultation_fee', '<=', $request->max_fee);
            });
        }

        $doctors = $query->paginate(9)->withQueryString();

        // Transform collection for JavaScript
        $doctorsFormatted = $doctors->getCollection()->map(function ($doctor) {
            $profile = $doctor->profile;
            $meta = $profile?->meta ?? [];

            return [
                'id' => $doctor->id,
                'name' => trim(($profile?->first_name ?? '') . ' ' . ($profile?->last_name ?? '')) ?: $doctor->name,
                'specialty' => $meta['department'] ?? $meta['specialty'] ?? 'General Physician',
                'sub' => $meta['designation'] ?? 'Doctor',
                'rating' => (float) ($meta['rating'] ?? 0),
                'experience' => (int) ($meta['experience'] ?? 0),
                'fee' => (float) ($meta['consultation_fee'] ?? 0),
                'location' => $meta['location'] ?? 'Not specified',
                'gender' => $profile?->gender ?? '',
                'available' => (bool) ($meta['available'] ?? false),
                'video' => (bool) ($meta['video_consult'] ?? false),
                'tags' => $meta['specialties'] ?? [],
                'img' => $profile?->avatar
                    ? asset('storage/' . $profile->avatar)
                    : asset('images/default-doctor.png'),
            ];
        })->values();

        return view('doctor', compact('doctors', 'doctorsFormatted', 'specialties'));
    }
}