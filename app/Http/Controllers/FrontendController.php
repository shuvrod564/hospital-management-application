<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Profile;

class FrontendController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index(Request $request): View
    {
        // 1. Fetch sorted unique specialties directly from database
        $specialties = Profile::whereNotNull('meta->department')
            ->selectRaw("JSON_UNQUOTE(JSON_EXTRACT(meta, '$.department')) as department")
            ->distinct()
            ->orderBy('department', 'asc')
            ->pluck('department')
            ->filter()
            ->values(); 

        return view('home', [
            'specialties' => $specialties
        ]);
    }

    
}
