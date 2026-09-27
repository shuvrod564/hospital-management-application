<?php

namespace App\Http\Controllers\Admin;
 
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;

class AdminUsersAuthController 
{
    /**
     * Display the admin login form.
     */
    public function showLoginForm(): View
    {
        return view('auth.admin-login');
    }

    /**
     * Handle the admin login request.$doctors = User::where('role', 'doctor')->get();
     */
    public function login(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Attempt to log the user in 
        if (Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            $request->session()->regenerate();

            if (auth()->user()->role !== 'admin') {
                Auth::logout();

                throw ValidationException::withMessages([
                    'email' => 'You do not have administrator access.',
                ]);
            }

            return redirect()->route('admin.dashboard');
        }

        // If the email/password combo is just completely wrong
        throw ValidationException::withMessages([
            'email' => trans('auth.failed'),
        ]);
    }

    /**
     * Handle the admin logout request.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin');
    }
} 
