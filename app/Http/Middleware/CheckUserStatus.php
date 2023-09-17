<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUserStatus
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->status === 'disabled') {
            Auth::logout();
            return redirect('/login')->with('status', 'Your account has been disabled.');
        }

        return $next($request);
    }
}
