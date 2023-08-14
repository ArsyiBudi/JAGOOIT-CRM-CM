<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class C_Auth extends Controller
{
    public function login (Request $request){
        $field = $request -> validate([
            'username' => 'required|string',
            'password' => 'required|string'
        ]);

        //Checking email
        $user = User::where('username', $field['username']) -> first();

        //Checking Password
        if(!$user ||  !User::where('password', $field['password']) -> first()){
            return response([
                'message' => 'Bad Creds'
            ], 401);
        };

        $token = $user -> createToken('myapptoken')->plainTextToken;

        $respone = [
            'user' => $user,
            'token' => $token
        ];
        return response($respone);
    }
}
