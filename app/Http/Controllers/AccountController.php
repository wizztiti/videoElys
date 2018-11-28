<?php

namespace App\Http\Controllers;

use App\User;
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
        $user = $this->auth->user();
        return view('userBoard.my-account', compact('user'));
    }

    public function update(Request $request) {
        $user = $this->auth->user();
        $user->update($request->only('lastname', 'firstname', 'email', 'address', 'postal_code',
            'city', 'country'));
        $user->newsletter = request('newsletter');
        $user->save();
        return redirect(route('my-account'));
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
