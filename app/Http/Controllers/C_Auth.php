<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\M_Users;
use Illuminate\Http\Request;
use Nette\Utils\DateTime;

class C_Auth extends Controller
{    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $user = M_Users::where('username', $credentials['username'])->first();

        if (!$user || !User::where('password', $credentials['password'])->first()) {
            return back()->with('loginError', 'Username Atau Password Salah!');
        } else if ($user->user_type_id == 3) {
            return back()->with('loginError', 'Akses Ditolak!');
        } else {
            Auth::attempt($credentials);
            $request->session()->regenerate();
            session(['user' => $user]);
            return redirect()->intended('/leads');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    }
}