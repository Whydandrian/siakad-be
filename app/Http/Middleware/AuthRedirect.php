<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthRedirect
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, string $redirectTo = 'dashboard.index', string $redirectIfGuest = 'login'): Response
    {
        if (Auth::check()) {
            // Jika sudah login, redirect ke route yang ditentukan
            return redirect()->route($redirectTo);
        }

        return $next($request);
    }
}