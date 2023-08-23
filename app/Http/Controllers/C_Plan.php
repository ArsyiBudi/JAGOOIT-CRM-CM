<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class C_Plan extends Controller
{
    public function popks_save(Request $request){
        $currentTimestamp = time();
        return response([
            'timestamp' => $currentTimestamp,
        ]);
    }
}
