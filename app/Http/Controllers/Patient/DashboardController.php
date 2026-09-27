<?php
 
namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display the dashboard view with user data.
     */
    public function index(): View
    {
        // Retrieve the currently authenticated user
        /** @var \App\Models\User $user */
        $user = Auth::user();

        return view('patient.dashboard', [
            'username' => $user->name, // Or $user->username depending on your schema
            'email'    => $user->email,
            'role'     => $user->role,     // Assumes a 'role' column or attribute exists on your User model
            'userData' => $user->toArray(), // Passes all other user attributes as an array
        ]);
    }
}