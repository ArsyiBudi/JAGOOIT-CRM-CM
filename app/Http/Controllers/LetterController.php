<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LetterController extends Controller
{
    public function save(Request $request)
    {
    $data = $request->all();

    $letter = new PopksLetter();
    $letter->employee_name = $data['employee_name'];
    $letter->employee_position = $data['employee_position'];
    $letter->employee_address = $data['employee_address'];
    $letter->client_name = $data['client_name'];
    $letter->client_position = $data['client_position'];
    $letter->client_address = $data['client_address'];
    $letter->start_date = $data['start_date'];
    $letter->end_date = $data['end_date'];
    $letter->nominal_fees = $data['nominal_fees'];
    $letter->included_fees = $data['included_fees'];
    $letter->weekday_cost = $data['weekday_cost'];
    $letter->weekend_cost = $data['weekend_cost'];
    $letter->notes = $data['notes'];
    $letter->consumption_cost = $data['consumption_cost'];
    $letter->transportation_cost = $data['transportation_cost'];
    $letter->billing_due_date = $data['billing_due_date'];
    $letter->billing_days = $data['billing_days'];
    $letter->authorized_by = $data['authorized_by'];
    $letter->account_number = $data['account_number'];
    $letter->bank_name = $data['bank_name'];
    $letter->jagoit_director = $data['jagoit_director'];
    $letter->client_director = $data['client_director'];
    
    
    $letter->save();

    // Lanjutkan ke langkah berikutnya atau tampilkan halaman hasil
    }

}
