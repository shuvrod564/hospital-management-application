<?php

namespace App\Http\Controllers\Admin;
 
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AdminDashboardController 
{
    /**
     * Display the admin dashboard.
     */
    public function index(Request $request): View
    {
        return view('admin.dashboard', [
            'user' => $request->user(), // Pass the authenticated user to the view
        ]);
    }
 
}
