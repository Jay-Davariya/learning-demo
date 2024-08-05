<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Events\UserLoggedIn;
use Illuminate\Http\Request;
use App\Models\User;
class LoginController extends Controller
{
    /*
    |------------------ --------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    use AuthenticatesUsers;
    public $user;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */ 
    public function __construct(User $user)
    {
        // event(new UserLoggedIn(auth()->customer(), 'You have successfully logged in.'));

        // $this->middleware('guest')->except('logout');
        // $this->middleware('auth')->only('logout');
    }

}
