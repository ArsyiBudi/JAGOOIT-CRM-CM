<?php

namespace App\Http\Controllers;

use App\Models\M_Orders;
use App\Models\M_Popks;
use Illuminate\Http\Request;
use Nette\Utils\DateTime;

class C_Plan extends Controller
{
    public function popks_create(Request $request){
        $field = $request->validate([
            'employee_name' => 'required',
            'employee_position' => 'required',
            'employee_address' => 'required',
            'client_name' => 'required',
            'client_position' => 'required',
            'client_address' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'nominal_fees' => 'required',
            'included_fees' => 'required',
            'weekday_cost' => 'required',
            'weekend_cost' => 'required',
            'notes' => 'required',
            'consumption_cost' => 'required',
            'transportation_cost' => 'required',
            'billing_due_date' => 'required',
            'billing_days' => 'required',
            'authorized_by' => 'required',
            'account_number' => 'required',
            'bank_name' => 'required',
            'jagoit_director' => 'required',
            'client_director' => 'required',
        ]);

        if(!$field) return response([
            'error' => 'error'
        ]);

        $popks = M_Popks::create([
            'letter_numbers' => '02/JTI/07/2023',
            'leads_id' => 1,
            'employee_name' => $field['employee_name'],
            'employee_position' => $field['employee_position'],
            'employee_address' => $field['employee_address'],
            'client_name' => $field['client_name'],
            'client_position' => $field['client_position'],
            'client_address' => $field['client_address'],
            'start_date' => $field['start_date'],
            'end_date' => $field['end_date'],
            'nominal_fees' => $field['nominal_fees'],
            'included_fees' => $field['included_fees'],
            'weekday_cost' => $field['weekday_cost'],
            'weekend_cost' => $field['weekend_cost'],
            'notes' => $field['notes'],
            'consumption_cost' => $field['consumption_cost'],
            'transportation_cost' => $field['transportation_cost'],
            'billing_due_date' => $field['billing_due_date'],
            'billing_days' => $field['billing_days'],
            'authorized_by' => $field['authorized_by'],
            'account_number' => $field['account_number'],
            'bank_name' => $field['bank_name'],
            'account_manager_provider' => "Sdr. Septian Nugraha Kudrat",
            'provider_finance_administrator' => "Sdri. Retno Aliifah",
            'jagoit_director' => $field['jagoit_director'],
            'client_director' => $field['client_director'],

        ]);
        
        $currentTimestamp = time();
        $selectedDate = new DateTime();
        $selectedDate->setTimestamp($currentTimestamp);
        return response([
            'end_date' => $selectedDate,
        ]);

        // return redirect('/client/order');
    }

    public function popks_send(Request $request, $order_id){
        $field = $request->validate([
            'po_file' => 'required',
            'po_descr' => 'required',
        ]);

        if(!$field) return response([
            'error' => 'error'
        ]);

        $popks = M_Orders::find($order_id);
        $popks-> po_file = $field['po_file'];
        $popks-> po_description = $field['po_descr'];
        $status = $popks->update();

        if($status){
            return redirect('/client/order');
        }
    }
}
