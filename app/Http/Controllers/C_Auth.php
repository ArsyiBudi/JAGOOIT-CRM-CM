<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
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
        $user = User::where('username', $field['username']) -> first();

        //Checking Password
        if(!$user ||  !User::where('password', $field['password']) -> first() ){
            return response([
                'message' => 'Bad Creds'
            ], 401);
        };

        $user_permission = User::where('username', $field['username'])->where('password', $field['password'])->orderBy('username')->orderBy('password')->first();
        if ($user_permission) {
            $user_type = $user_permission->user_type_id;
            if($user_type == 3){
                return response([
                    'message' => 'Bad Creds'
                ], 401);
            }
            return redirect('/leads');
        }
        // $token = $user -> createToken('myapptoken')->plainTextToken;
    }
}
