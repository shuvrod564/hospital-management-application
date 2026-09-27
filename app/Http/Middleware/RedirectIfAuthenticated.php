<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if ($request->is('admin/*') || $request->is('admin')) return redirect()->route('admin.dashboard');
                if ($request->is('doctor/*') || $request->is('doctor')) return redirect()->route('doctor.dashboard');
                if ($request->is('user/*') || $request->is('user')) return redirect()->route('user.dashboard');

                // If logged in and visit standard /login, redirect by role
                if (Auth::user()->isAdmin()) return redirect()->route('admin.dashboard');
                if (Auth::user()->isDoctor()) return redirect()->route('doctor.dashboard');
                return redirect()->route('user.dashboard');
            }
        }
        return $next($request);
    }
}