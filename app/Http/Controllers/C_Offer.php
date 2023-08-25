<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\M_Offer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class C_Offer extends Controller
{
    public function create(Request $request)
    {
        $selectedTimestamp = time();
        $selectedDate = new DateTime();
        $selectedDate->setTimestamp($selectedTimestamp);
        $selectedMonth = $selectedDate->format('m');
        $selectedYear = $selectedDate->format('Y'); 

        $input = $request->validate([
            'offer_subject' => 'required',
            'recipient_name' => 'required',
            'location' => 'required',
            'date' => 'required',
            'context' => 'required',
            'talent_total' => 'required',
            'weekday_cost' => 'required',
            'weekend_cost' => 'required',
            'consumtion_cost' => 'required',
            'transportation_cost' => 'required',
        ]);
        if(!$input) return response([
            'error' => 'error'
        ], 404);
        M_Offer::create([
            'letter_number' => "JTI/{$selectedMonth}/SP/{$selectedYear}",
            'offer_subject' => $input['offer_subject'],
            'recipient_name' => $input['recipient_name'],
            'location' => $input['location'],
            'date' => $input['date'],
            'context' => $input['context'],
            'talent_total' => $input['talent_total'],
            'weekday_cost' => $input['weekday_cost'],
            'weekend_cost' => $input['weekend_cost'],
            'consumtion_cost' => $input['consumtion_cost'],
            'transportation_cost' => $input['transportation_cost'],
        ]);

        $currentTimestamp = time();
        $selectedDate = new DateTime();
        $selectedDate->setTimestamp($currentTimestamp);
        return response([
            'End_Offer' => $selectedDate,
            'Start_Appointment' => $selectedDate
        ]);
        
        // if ($offer) {
        //     return redirect('/client/order/plan/negosiasi')->with('success', 'Data berhasil ditambahkan');
        // } else {
        //     return redirect('/client/order/plan/penawaran')->with('error', 'Data gagal ditambahkan');
        // }
        
    }
}