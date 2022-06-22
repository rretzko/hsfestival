<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Phone;
use App\Models\Phonetype;
use App\Models\School;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = RouteServiceProvider::USERHOME;

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'school' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::updateOrCreate(
            [
                'name'     => $data['name'],
                'email'    => $data['email'],
            ],
            [
                'password' => Hash::make($data['password']),
            ]
        );

        School::updateOrCreate(
            [
                'name' => $data['school'],
                'user_id' => $user->id,
            ],
            [
                'state_abbr' => 'NJ',
            ]
        );

        Phone::updateOrCreate([
           'user_id' => $user->id,
           'phonetype_id' => Phonetype::MOBILE,
           'phone' => $data['phone'],
        ]);

        return $user;
    }
}
