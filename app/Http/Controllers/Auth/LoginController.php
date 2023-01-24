<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Redirect;

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
    // protected $redirectTo = RouteServiceProvider::HOME;



    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('guest')->except('logout');
    }



    // public function login(Request $request)
    public function redirectTo()
    {

        // use strict equality sign every time
        if(Auth::user()->status === 0) {
            Auth::logout();
            return Redirect::back()->withErrors(['msg' => 'The Message']);
        }

        if (Auth::check()){
            // 1 admin
            // 2 encoder
            // 3 registrar
            if (auth()->user()->role === 1) {
                return ('userAdmin/index');
            }else if (auth()->user()->role === 2) {
                return ('userRegistrar/index');
            }else if (auth()->user()->role === 3) {
                return ('userEncoder/index');
            }else{
                return ('login')->with('error','User Not Found.');
            }
        }else{
            return ('login')->with('error','User Not Found.');
        }
    }

    protected function authenticated(Request $request)
    {
        Auth::logoutOtherDevices($request->password);
    }
    public function username()
    {
        return 'username';
    }


}
