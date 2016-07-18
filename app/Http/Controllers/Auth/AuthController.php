<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Http\Requests;
use Illuminate\Http\Request;

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use League\OAuth2\Server;
use Log;


class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    //protected $redirectTo = '/home';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
        {
            $this->redirectPath = route('home');

        }

        public function redirectToProvider($provider)
        {
            return Socialite::driver($provider)->redirect();
        }
        
         public function handleProviderCallback($provider)
        {
         //notice we are not doing any validation, you should do it

            $user = Socialite::driver($provider)->user();
             
            // stroing data to our use table and logging them in
            $data = [
                'name' => $user->getName(),
                'email' => $user->getEmail()
            ];
         
            // Here, check if the user already exists in your records

            $my_user = User::where('email','=', $user->getEmail())->first();
            if($my_user === null) {
                    Auth::login(User::firstOrCreate($data));
            } else {
                Auth::login($my_user);
            }

            //after login redirecting to home page
            return redirect($this->redirectPath());
        }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'last_name'=>'required|max:255',
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'terms_agreement'=>'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {

        
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'terms_agreement' => 1,
            'last_name' => $data['last_name'],

        ]);
    }
}
