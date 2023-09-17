<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/library';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');  // Redirecting to the login page after logout
    }
    
    public function login(Request $request)
    {
        $this->validateLogin($request);
    
        // Check if the user is active before attempting to log in
        if ($this->attemptLogin($request)) {
            $user = $this->guard()->user();
    
            if ($user->status == 'active') {
                // Determine where to redirect based on the user type
                if ($user->role === 'admin') {
                    return redirect()->intended('/admin/books');
                } elseif ($user->role === 'user') {
                    return redirect()->intended('/');
                }
            } else {
                // If the user is not active, force a logout
                $this->guard()->logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
    
                return redirect()->back()
                    ->withInput($request->only($this->username(), 'remember'))
                    ->withErrors(['status' => 'Your account is not active.']);
            }
        }
    
        return $this->sendFailedLoginResponse($request);
    }
    
}
