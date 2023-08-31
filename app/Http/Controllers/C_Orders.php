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
    public function generateUniqueRandomId()
    {
        $unique = false;
        $randomId = '';

        while (!$unique) {
            $randomId = strtoupper(substr(md5(microtime()), 0, 8)); // Generate a random ID
            
            // Check if the generated ID already exists in the orders table
            if (!M_Orders::where('id', $randomId)->exists()) {
                $unique = true;
            }
        }

        return $randomId;
    }

    public function fetch(Request $request){
        $entries = $request->input('per_page', 5);
        $search = $request->input('search', '');

        $data = M_Orders::paginate($entries);
        return view('admin.client.order.list', [
            "title" => "Client | Order List",
            "order" => $data
        ]);
    }

    public function newOrder(){
        $leads = M_Leads::all();
        $randomId = $this -> generateUniqueRandomId();
        return view('admin.client.order.create', [
            "title" => "Client | Create Order",
            "leads" => $leads,
            "randomId" => $randomId
        ]);
    }
    public function track(Request $request){
        $field = $request -> validate([
            'order_id' => 'required'
        ]);

        $order_data['data'] = M_Orders::find($field['order_id'])->get();
        if(!$order_data){
            return response([
                'message' => "No order has an id of {$request['order_id']}"
            ], 401);
        };
        return view('clients.track', $order_data);
    }
    public function create(Request $request){
        $field = $request -> validate([
            'business_id' => 'required', 
            'desired_position' => 'required', 
            'needed_qty' => 'required', 
            'due_date' => 'required', 
            'description' => 'required', 
            'characteristic_desc' => 'required', 
            'skills_desc' => 'required', 
            'budget_estimation' => 'required',
            'tor_file' => 'required'
        ]);
        $order = M_Orders::create([
            'id' => $request -> id,
            'leads_id' => $field['business_id'],
            'desired_position' => $field['desired_position'],
            'needed_qty' => $field['needed_qty'],
            'due_date' => $field['due_date'],
            'description' => $field['description'],
            'characteristic_desc' => $field['characteristic_desc'],
            'skills_desc' => $field['skills_desc'],
            'budget_estimation' => $field['budget_estimation'],
            'tor_file' => $field['tor_file'],
        ]);

        if(!$order){
            return response([
                'error' => 'error'
            ]);
        }

        $update = M_Leads::find($field['business_id']);
        $update -> client_indicator = 1;
        $status = $update->update();

        
        if($status){
            return redirect('/client');
        }
    }
}