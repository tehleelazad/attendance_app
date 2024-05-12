<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the authenticated user is an admin with ID 1
        if (Auth::check() && Auth::user()->id === 1) {
            // Proceed with the request
            return $next($request);
        }

        // Return an unauthorized response if the user is not an admin with ID 1
        return response()->json(['error' => 'Unauthorized'], 403);
    }
}
