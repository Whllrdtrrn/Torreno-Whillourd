<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if ($user && $user->role === 'user') {
            return $next($request);
        }

        return redirect('/'); // Redirect non-user type users to the home page or another route
    }
}
