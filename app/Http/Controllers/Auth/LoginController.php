<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    //this is the defeault after the user login: it will be redirected to home: and thisis whre we need to configure it
    //    protected $redirectTo = RouteServiceProvider::HOME;
//by creating a function you will customize the root for the login page

//this is where the login process comes i
    protected function authenticated()
    {
        if(Auth::user()->role_as == '1'){
            return redirect('admin/dashboard')->with('message', 'Welcome to dashboard');
        }
        else{
            return redirect('/')->with('status', 'Login Successfully');
        }
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}