<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class DoctorAuthController extends Controller
{
    public function showLoginForm() { return view('auth.doctor-login'); }

    public function login(Request $request)
    {
        $credentials = $request->validate(['email' => 'required|email', 'password' => 'required']);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            if (Auth::user()->isDoctor()) {
                $request->session()->regenerate();
                return redirect()->route('doctor.dashboard');
            }
            Auth::logout();
            throw ValidationException::withMessages(['email' => 'You do not have Doctor access.']);
        }
        throw ValidationException::withMessages(['email' => trans('auth.failed')]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/doctor/login');
    }
}