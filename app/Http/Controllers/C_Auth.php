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
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::guard('web')->attempt($credentials)) {
            $user = Auth::guard('web')->user();

            if ($user->user_type_id == 3) {
                Auth::guard('web')->logout();
                return back()->with('message', 'Akses Ditolak');
            }

            session(['user' => $user]);
            return redirect('/leads');
        } else {
            return back()->with('message', 'Invalid credentials');
        }
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }

    public function changePassword(Request $request, $id, $newPassword)
    {
        $user = M_Users::find($id);
        $user->password = Hash::make($newPassword);
        $status = $user->save();

        if ($status)
            return response('berhasil');
    }
}