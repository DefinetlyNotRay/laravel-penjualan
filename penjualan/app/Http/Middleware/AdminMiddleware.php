<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated and is an admin
        if ($request->user() && $request->user()->isAdmin()) {
            return $next($request);
        }

        // Redirect or respond with an error for unauthorized access
        return redirect('/dashboardKasir')->with('error', 'Unauthorized access');
    }
}