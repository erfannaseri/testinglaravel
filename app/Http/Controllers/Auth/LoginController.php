<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Socialite;
use App\User;
use Auth;

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
    }

    protected function credentials(Request $request)
    {
        //return $request->only($this->username(), 'password');

        return ['email'=>$request->{$this->username()},'password'=>$request->password,'status'=>'1'];
    }

    public function socialLogin($social)
    {
       return Socialite::driver($social)->redirect();
    }

    public function handleProviderCallback($social)
    {
        $usersocial=Socialite::driver($social)->user();

        $user=User::where(['email'=>$usersocial->getEmail()]);

        if ($user) {

            return redirect(route('home'));

        } else {
            return view('auth.register',['name'=>$usersocial->getName(),'email'=>$usersocial->getName()]);
        }


    }



}
