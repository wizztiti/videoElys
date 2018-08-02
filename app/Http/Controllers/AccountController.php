<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class AccountController extends Controller
{

    use ResetsPasswords;

    private $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function accueil()
    {
        return view('userBoard.my-account');
    }

    public function showFormPassword()
    {
        $user = $this->auth->user();
        return view('userBoard.passwordForm', compact('user'));
    }

    public function updatePassword(Request $request)
    {
        $user = $this->auth->user();
        $password = Hash::make($request->get('password'));
        DB::table('users')
            ->where('id', $user->id)
            ->update(['password' => $password]);
        return redirect()->route('my-account ');
    }
    
    /**
     * Get the password reset validation rules.
     *
     * @return array
     */
    protected function rules()
    {
        return [
            'password' => 'required|confirmed|min:6',
        ];
    }

}
