<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class RedirectTo404
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        // Check if the user is authorized to access the current route
        if (!Auth::check() || !$this->isAuthorized($request)) {
            // Redirect to the 404 page
            abort(404);
        }

        return $next($request);
    }

    // Define your authorization logic here
    private function isAuthorized($request)
    {
        // Implement your authorization logic based on the request or user roles
        // For example, check user roles or route names here

        // Return true if authorized, false otherwise
        return true; // Change this to your actual authorization logic
    }
}
