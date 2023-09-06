<?php

namespace App\Http\Controllers;

use App\Models\M_Offer;
use App\Models\M_OfferLetterJobsDetails;
use App\Models\M_OrderDetails;
use App\Models\M_Orders;
use App\Models\M_Popks;
use App\Models\M_Talents;
use Illuminate\Http\Request;
use Nette\Utils\DateTime;
use PhpOffice\PhpWord\TemplateProcessor;

class C_Plan extends Controller
{

    public function generateWordOffer($offer_letter_id)
    {
        $offer = M_Offer::find($offer_letter_id);
        $phpWord = new TemplateProcessor('template.docx');
        $phpWord->setValue('no_surat', $offer -> letter_number);
        $phpWord->setValue('perihal', $offer -> offer_subject);
        $phpWord->setValue('kepada', $offer -> recipient_name);
        $phpWord->setValue('tempat', $offer -> location);
        $phpWord->setValue('tanggal', $offer -> date);
        $phpWord->setValue('ditawarkan', $offer -> context);
        $phpWord->setValue('jumlahTalent', $offer -> talent_total);
        $phpWord->setValue('weekday', $offer -> weekday_cost);
        $phpWord->setValue('weekend', $offer -> weekend_cost);
        $phpWord->setValue('konsumsi', $offer -> consumption_cost);
        $phpWord->setValue('transPP', $offer -> transportation_cost);
        $replc = [];
        foreach($offer->offerJobDetails as $detail) {
            $replc[] = [
                'quantity' => $detail->quantity,
                'needed_job' => $detail->needed_job,
                'city_location' => $detail->city_location,
                'contract_duration' => $detail->contract_duration,
            ];
        }
        $phpWord->cloneBlock('table_block_placeholder', 0, true, false, $replc);
        $tempFilePath = tempnam(sys_get_temp_dir(), 'Surat_Penawaran');
        $phpWord->saveAs($tempFilePath);
        $headers = [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'Content-Disposition' => 'attachment; filename="Surat_Penawaran.docx"',
        ];
        return response()->file($tempFilePath, $headers);
    }

    //?BELOW ARE USED FOR HANDLING PLAN ROUTES
    public function handlePlanRoute($order_id)
    {
        $selectedTimestamp = time();
        $selectedDate = new DateTime();
        $selectedDate->setTimestamp($selectedTimestamp);

        $order = M_Orders::find($order_id);
        if (is_null($order->start_recruitment)) {
            $order->start_recruitment = $selectedDate;
            $order->save();
        }
        $routes = ['','recruitment', 'training', 'penawaran', 'negosiasi', 'percobaan', 'popks', 'popks', ''];
        return redirect("/client/order/plan/$order_id/{$routes[$order -> order_status]}");    
    }

    //?BELOW ARE TO FETCH A DATA
    public function fetchRecruitment(Request $request, $order_id)
    {
        $perPage = $request->input('per_page', 5);
        $search = $request->input('search', '');
    
        session(['talent_per_page' => $perPage]);
        session(['talent_search' => $search]);

        $entries = session('talent_per_page', 5);
        $search = session('talent_search', '');

        $talent = M_Talents::where(function($query) use ($search){
            $query -> where('name', 'like', "%$search%")
            ->orWhereHas('posisiTalent',function($query) use ($search){
                $query -> where('description', 'like', "%$search%");
            }) 
            ->orWhereHas('keterampilanTalent',function($query) use ($search){
                $query -> where('description', 'like', "%$search%");
            }) 
            ->orWhereHas('pendidikanTalent',function($query) use ($search){
                $query -> where('description', 'like', "%$search%");
            });
        }) ->where('is_active', '=', '0')->paginate($entries);

        return view('admin.client.plan.recruitment', [
            "title" => "Plan | Recruitment",
            'talents' => $talent,
            "order_id" => $order_id
        ]);
    }

    public function fetchTraining($order_id)
    {
        $talent = M_Orders::where('id', $order_id)->paginate(5);
        return view('admin.client.plan.training', [
            "title" => "Plan | Training",
            "datas" => $talent,
            "order_id" => $order_id
        ]);
    }
    public function fetchNegosiasi($order_id)
    {
        return view('admin.client.plan.negosiasi', [
            "title" => "Plan | Negosiasi",
            "order_id" => $order_id,
        ]);
    }
    public function fetchPercobaan($order_id)
    {
        return view('admin.client.plan.percobaan', [
            "title" => "Plan | Percobaan",
            "order_id" => $order_id,
        ]);
    }
    
    public function fetchPopks($order_id)
    {
        return view('admin.client.plan.popks', [
            "title" => "Plan | POPKS",
            "order_id" => $order_id,
        ]);
    }


    //?BELOW ARE USED IN RECRUITMENT PLAN
    public function saveRecruitment(Request $request, $order_id)
    {
        $selectedTimestamp = time();
        $selectedDate = new DateTime();
        $selectedDate->setTimestamp($selectedTimestamp);
        $update = M_Orders::find($order_id);
        $update -> order_status = 2;
        foreach($request -> talents_id as $talent_id)
        {
            M_OrderDetails::create([
                'talent_id' => $talent_id,
                'order_id' => $order_id
            ]);
            $update = M_Talents::find($talent_id);
            $update -> is_active = 1;
            $update -> save();
        }

        if (is_null($update->end_recruitment) && is_null($update->start_training)) {
            $update->end_recruitment = $selectedDate;
            $update->start_training = $selectedDate;
        }
        $update->save();
        return redirect('/client/order/plan/'. $order_id .'/training/');
    }


    //?BELOW ARE USED IN TRAINING PLAN
    public function saveTraining($order_id)
    {
        $selectedTimestamp = time();
        $selectedDate = new DateTime();
        $selectedDate->setTimestamp($selectedTimestamp);

        $offer = M_Offer::create();
        $update = M_Orders::find($order_id);
        $update -> offer_letter_id = $offer -> id;
        $update -> order_status = 3;
        if(is_null($update -> end_training) && is_null($update -> start_offer)){
            $update->end_training = $selectedDate;
            $update->start_offer = $selectedDate;
        }
        $status = $update -> update();
        if($status) return redirect('/client/order/plan/'. $order_id .'/penawaran/');
    }

    //?BELOW ARE USED IN OFFER PLAN
    public function openOffer($order_id)
    {
        $order = M_Orders::find($order_id);
        $offer = M_Offer::find($order -> offer_letter_id);
        return view('admin.client.plan.penawaran', [
            "title" => "Plan | Penawaran",
            "offer" => $offer,
            "order_id" => $order_id
        ]);
    }

    public function addOfferDetails(Request $request, $order_id)
    {
        $field = $request -> validate([
            'needed_job' => 'required',
            'quantity' => 'required',
            'city_location' => 'required',
            'contract_duration' => 'required'
        ]);
        $order = M_Orders::find($order_id);
        $offer_details = M_OfferLetterJobsDetails::create([
            'offer_letters_id' => $order -> offer_letter_id,
            'needed_job' => $field['needed_job'],
            'quantity' => $field['quantity'],
            'city_location' => $field['city_location'],
            'contract_duration' => $field['contract_duration'],
        ]);

        if(!$offer_details) return response(['error' => "Data didn't created"]);
        return redirect()->back();
    }

    public function createOffer(Request $request, $order_id)
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
        if (!$input) return response(['error' => 'error'], 404);
        
        $order = M_Orders::find($order_id);
        $offer = M_Offer::find($order -> offer_letter_id);
        if(!$offer) return response([
            'error' => "No offer has this id: $order -> offer_letter_id"
        ]);

        $offer->letter_number = "JTI/{$selectedMonth}/SP/{$selectedYear}";
        $offer->offer_subject = $input['offer_subject'];
        $offer->recipient_name = $input['recipient_name'];
        $offer->location = $input['location'];
        $offer->date = $input['date'];
        $offer->context = $input['context'];
        $offer->talent_total = $input['talent_total'];
        $offer->weekday_cost = $input['weekday_cost'];
        $offer->weekend_cost = $input['weekend_cost'];
        $offer->consumption_cost = $input['consumption_cost'];
        $offer->transportation_cost = $input['transportation_cost'];
        $status = $offer -> save();
        if (!$status) {
            return response([
                'error' => "Data didn't updated"
            ]);
        } else {
            $status = $this -> generateWordOffer($order -> offer_letter_id);
            if($status) return $status;
        }
        return redirect()->back();
    }

    public function offer_send(Request $request, $order_id)
    {
        $field = $request->validate([
            'cv_file' => 'required',
            'cv_desc' => 'required',
        ]);
        if (!$field) return response([
            'error' => 'error'
        ]);
        $offer = M_Orders::find($order_id);
        $offer->cv_file = $field['cv_file'];
        $offer->cv_description = $field['cv_desc'];
        $status = $offer->update();
        if (!$status) {
            return response([
                'error' => "data didn't updated"
            ]);
        }
        return redirect()->back();
    }
    public function offer_save($order_id)
    {
        $currentTimestamp = time();
        $selectedDate = new DateTime();
        $selectedDate->setTimestamp($currentTimestamp);
        
        $offer = M_Offer::create();
        $update = M_Orders::find($order_id);
        $update -> offer_letter_id = $offer -> id;
        $update -> order_status = 3;
        $update -> end_offer = $selectedDate;
        $update -> start_appointment = $selectedDate;
        $status = $update -> update();
        if($status) return redirect('/client/order/plan/'.$order_id.'/negosiasi');

    }

    //?NEGOSIASI CONTROLLER CODE
    


    //?PERCOBAAN CONTROLLER CODE

    

    //?POPKS CONTROLLER CODE
    public function popks_create(Request $request)
    {
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

        if (!$field) return response([
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

    }

    public function popks_send(Request $request, $order_id)
    {
        $field = $request->validate([
            'po_file' => 'required',
            'po_descr' => 'required',
        ]);

        if (!$field) return response([
            'error' => 'error'
        ]);

        $popks = M_Orders::find($order_id);
        $popks->po_file = $field['po_file'];
        $popks->po_description = $field['po_descr'];
        $status = $popks->update();

        if ($status) {
            return redirect('/client/order');
        }
    }

    public function popks_save($order_id)
    {
        $currentTimestamp = time();
        $selectedDate = new DateTime();
        $selectedDate->setTimestamp($currentTimestamp);
        
        $offer = M_Offer::create();
        $update = M_Orders::find($order_id);
        $update -> offer_letter_id = $offer -> id;
        $update -> order_status = 7;
        $update -> end_popks = $selectedDate;
        $status = $update -> update();
        if($status) return redirect('/client/order');

    }
}