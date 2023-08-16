<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class C_Orders extends Controller
{
    public function track(Request $request){
        $field = $request -> validate([
            'order_id' => 'required'
        ]);

        $order_data['data'] = DB::table('orders')->where('id', $field['order_id']) -> first();
        if(!$order_data['data']){
            return response([
                'message' => "No order has an id of {$request['order_id']}"
            ], 401);
        };
        $order_data['data'] = DB::table('orders')->where('id', $field['order_id']) -> first() -> get();
        return view('clients.track', $order_data);
    }
}
