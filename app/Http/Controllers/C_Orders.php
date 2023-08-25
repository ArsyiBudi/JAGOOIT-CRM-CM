<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\M_Leads;
use App\Models\M_Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

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
    public function create(Request $request){
        $field = $request->validate([
            'id' => 'required',
            'company_name'=>'required',
            'desired_position' => 'required',
            'needed_qty' => 'required',
            'due_date' => 'required',
            'description' => 'required',
            'skills_desc' => 'required',
            'budget_estimation' => 'required',
            'characteristic_desc' =>'required',
            'tor_file' => 'required'
        ]);
        
        $randomId = Uuid::uuid4()->toString();
        $selectedValue = $request->input('business_name');
        
        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $filePath = $file->storeAs($fileName);

        $activity = M_Orders::create([

            'tor_file',
            'id' => $randomId,
            'leads_id' => null,
            'offer_letter_id' => null,
            'popks_letter_id' => null,
            'order_status' => null,
            'desired_position' => $field['desired_position'],
            'needed_qty' => $field['needed_qty'],
            'due_date' => $field['due_date'],
            'description' => $field['description'],
            'characteristic_desc' => $field['characteristic_desc'],
            'skills_desc' => $field['skills_desc'],
            'budget_estimation' => $field['budget_estimation'],
            'start_recruitment' => null,
            'end_recruitment'=> null,
            'start_training' => null,
            'end_training' => null,
            'start_offer' => null,
            'end_offer' => null,
            'start_appointment' => null,
            'end_appointment' => null,
            'start_probation' => null,
            'end_probition' => null,
            'start_popks' => null,
            'end_popks' => null,
            'tor_file' => $filePath,
            'cv_file' => null,
            'po_file' => null,
        ]);

        if (!$activity) {
            return response([
                'error' => 'Error Occurred during activity creation',
            ]);
        }
    }
}
