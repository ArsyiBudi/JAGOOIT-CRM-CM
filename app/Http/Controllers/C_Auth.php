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
    public function login (Request $request){
        $field = $request -> validate([
            'username' => 'required|string',
            'password' => 'required|string'
        ]);

        //Checking email
        $user = M_Users::where('username', $field['username']) -> first();

        //Checking Password
        if(!$user ||  !User::where('password', $field['password']) -> first()){
            return response([
                'message' => 'Bad Creds'
            ], 401);
        };

        $user_type = $user->user_type_id;
        if($user_type == 3){
            return response(['message' => 'bad creds']);
        }
        
        // $token = $user -> createToken('jagoit')->plainTextToken;
        // return response()->json(['token' => $token]);
        // return response()->json(['message' => 'Unauthorized'], 401);
        // $token = $user -> createToken('myapptoken')->plainTextToken;

        session(['user' => $user ]);
        return redirect('/leads' );
    }
}