<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
    public function username()
    {
        return 'username';  // Changed from 'email' to 'username'
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|string', // Validate username
            'password' => 'required|string|min:6',
        ]);
    
        if (Auth::attempt(['username' => $request->input('username'), 'password' => $request->input('password')], $request->remember)) {
            return redirect()->intended($this->redirectPath());
        }
    
        return back()->withErrors(['username' => 'These credentials do not match our records.']);
    }
    public function loginView(){
        return view('login');
    }
}
