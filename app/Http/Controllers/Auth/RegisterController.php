<?php

namespace App\Http\Controllers\Auth;

use App\Mail\registerUser;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Mail;

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
    protected $redirectTo = '/home';

    private $auth;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
        $this->middleware('guest');
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
            'name' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $token = str_random(60);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'confirmation_token' =>$token,
            'password' => Hash::make($data['password']),
        ]);

        Mail::to($user)->send(new registerUser($token, $user));

        return $user;

    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        try {
            $this->validator($request->all())->validate();

            event(new Registered($user = $this->create($request->all())));

            //$this->guard()->login($user);

            flash('Votre compte a bien été créé, mais vous devez le confirmer !');
            return $this->registered($request, $user);
        } catch(\Exception $exception) {
            flash('Votre compte n\'a pas pu être créé', 'warning');
            Log::warning($exception->getCode() . '  ' . $exception->getMessage());
            return redirect($this->redirectPath());
        }
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        return redirect($this->redirectPath());
    }

    protected function registerConfirm(Request $request, $user_id, $token)
    {
        $user = User::findOrFail($user_id);
        if($user->confirmation_token == $token && $user->confirmed == false) {
            $user->confirmation_token = null;
            $user->confirmed = true;
            $user->save();
        } else {
            return abort(500);
        }

        $this->auth->login($user);
        return redirect('/')->with(flash('Votre compte a bien été confirmé'));
    }

}
