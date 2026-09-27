<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DoctorSearchController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string|max:100',
            'specialty' => 'nullable|string|max:100',
            'location' => 'nullable|string|max:100',
        ]);

        $query = User::query()
            ->where('role', 'doctor')
            ->with('profile');

        // Search by doctor name
        if ($request->filled('search')) {
            $search = $request->input('search');

            $query->where('name', 'like', "%{$search}%");
        }

        // Filter by specialty / department
        if ($request->filled('specialty')) {
            $specialty = $request->input('specialty');

            $query->whereHas('profile', function ($q) use ($specialty) {
                $q->where('meta->department', $specialty);
            });
        }

        // Filter by location
        if ($request->filled('location')) {
            $location = $request->input('location');

            $query->whereHas('profile', function ($q) use ($location) {
                $q->where('address', 'like', "%{$location}%");
            });
        }

        $doctors = $query
            ->orderBy('name')
            ->paginate(9)
            ->withQueryString();

        // Get available specialties for the dropdown
        $specialties = User::where('role', 'doctor')
            ->with('profile')
            ->get()
            ->pluck('profile.meta.department')
            ->filter()
            ->unique()
            ->sort()
            ->values();

        return view('doctor', compact('doctors', 'specialties'));
    }
}