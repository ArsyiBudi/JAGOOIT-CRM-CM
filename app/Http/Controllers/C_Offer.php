<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\M_Offer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PhpOffice\PhpWord\TemplateProcessor;

class C_Offer extends Controller
{
    public function newOffer(){
        $offer = M_Offer::create();
        return redirect('/client/order/plan/penawaran/' .$offer->id);
    }
    public function create(Request $request, $id)
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
            'consumption_cost' => 'required',
            'transportation_cost' => 'required',
        ]);

        $findid = M_Offer::find($id);
        $findid-> letter_number = "JTI/{$selectedMonth}/SP/{$selectedYear}";
        $findid-> offer_subject = $input['offer_subject'];
        $findid-> recipient_name = $input['recipient_name'];
        $findid-> location = $input['location'];
        $findid-> date = $input['date'];
        $findid-> context = $input['context'];
        $findid-> talent_total = $input['talent_total'];
        $findid-> weekday_cost = $input['weekday_cost'];
        $findid-> weekend_cost = $input['weekend_cost'];
        $findid-> consumption_cost = $input['consumption_cost'];
        $findid-> transportation_cost = $input['transportation_cost'];
        $status = $findid->update();
        
        
        // $create =  M_Offer::create([
        //     'letter_number' => "JTI/{$selectedMonth}/SP/{$selectedYear}",
        //     'offer_subject' => $input['offer_subject'],
        //     'recipient_name' => $input['recipient_name'],
        //     'location' => $input['location'],
        //     'date' => $input['date'],
        //     'context' => $input['context'],
        //     'talent_total' => $input['talent_total'],
        //     'weekday_cost' => $input['weekday_cost'],
        //     'weekend_cost' => $input['weekend_cost'],
        //     'consumtion_cost' => $input['consumption_cost'],
        //     'transportation_cost' => $input['transportation_cost'],
        // ]);
        if(!$input) return response([
            'error' => 'error'
        ], 404);

        // $currentTimestamp = time();
        // $selectedDate = new DateTime();
        // $selectedDate->setTimestamp($currentTimestamp);
        // return response([
        //     'End_Offer' => $selectedDate,
        //     'Start_Appointment' => $selectedDate
        // ]);
        
        // if ($status) {
        //     return redirect('/client/order/plan/negosiasi');
        // } else {
        //     return redirect('/client/order/plan/penawaran');
        // }

        $phpWord = new TemplateProcessor('template.docx');
        
        $phpWord->setValue('perihal', $input['offer_subject']);
        $phpWord->setValue('kepada', $input['recipient_name']); 
        $phpWord->setValue('tempat', $input['location']); 
        $phpWord->setValue('tanggal', $input['date']); 
        $phpWord->setValue('ditawarkan', $input['context']); 
        $phpWord->setValue('jumlahTalent', $input['talent_total']); 
        $phpWord->setValue('weekday', $input['weekday_cost']); 
        $phpWord->setValue('weekend', $input['weekend_cost']); 
        $phpWord->setValue('konsumsi', $input['consumption_cost']); 
        $phpWord->setValue('transPP', $input['transportation_cost']); 

        $replc = array(
            array('qty'=> '12', 'needed_job'=> 'BE', 'city_location' => 'Liverpool'),
            array('qty'=> '11', 'needed_job'=> 'FE', 'city_location' => 'Manchester'),
            array('qty'=> '1', 'needed_job'=> 'BE', 'city_location' => 'Londo'),
        );

    $phpWord->cloneBlock('table_block_placeholder', 0, true, false, $replc);


    $tempFilePath = tempnam(sys_get_temp_dir(), 'Surat_Penawaran');
    $phpWord->saveAs($tempFilePath);

    
    $headers = [
        'Content-Type' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        'Content-Disposition' => 'attachment; filename="Surat_Penawaran.docx"',
    ];

    // Create and return the response with the file contents and headers
    return response()->file($tempFilePath, $headers);
        
    }
}