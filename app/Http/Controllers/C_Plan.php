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
    //?BELOW ARE TO FETCH A DATA
    public function fetch_recruitment($order_id)
    {
        $talent = M_Talents::paginate(5);
        return view('admin.client.plan.recruitment', [
            "title" => "Plan | Recruitment",
            'talents' => $talent
        ]);
    }

    public function fetch_training($order_id)
    {
        $talent = M_Orders::where('id', $order_id)->paginate(5);
        return view('admin.client.plan.training', [
            "title" => "Plan | Training",
            "datas" => $talent,
        ]);
    }





    //?BELOW ARE USED IN OFFER PLAN
    public function newOffer(Request $request, $order_id)
    {
        $offer = M_Offer::create();
        $update = M_Orders::find($order_id);
        $update -> offer_letter_id = $offer -> id;
        $status = $update -> update();
        if(!$status){
            return redirect() -> back() -> with('error', 'Nigga');
        }
        return redirect('/client/order/'. $order_id .'/penawaran/');
    }

    public function openOffer($order_id)
    {
        $order = M_Orders::find($order_id);
        $offer = M_Offer::find($order -> offer_letter_id);
        return view('admin.client.plan.penawaran', [
            "title" => "Plan | Penawaran",
            "offer" => $offer
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
        return redirect('open_offer');
    }

    public function create(Request $request, $order_id)
    {
        $order = M_Orders::find($order_id);
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

        $selectedTimestamp = time();
        $selectedDate = new DateTime();
        $selectedDate->setTimestamp($selectedTimestamp);
        $selectedMonth = $selectedDate->format('m');
        $selectedYear = $selectedDate->format('Y');

        $findid = M_Offer::find($order -> offer_letter_id);
        if(!$findid) return response(['error' => "No offer has this id: $order -> offer_letter_id"]);

        $findid->letter_number = "JTI/{$selectedMonth}/SP/{$selectedYear}";
        $findid->offer_subject = $input['offer_subject'];
        $findid->recipient_name = $input['recipient_name'];
        $findid->location = $input['location'];
        $findid->date = $input['date'];
        $findid->context = $input['context'];
        $findid->talent_total = $input['talent_total'];
        $findid->weekday_cost = $input['weekday_cost'];
        $findid->weekend_cost = $input['weekend_cost'];
        $findid->consumption_cost = $input['consumption_cost'];
        $findid->transportation_cost = $input['transportation_cost'];
        $status = $findid -> save();
        if (!$status) {
            return response([
                'error' => "Data didn't updated"
            ]);
        }

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
            array('qty' => '12', 'needed_job' => 'BE', 'city_location' => 'Liverpool'),
            array('qty' => '11', 'needed_job' => 'FE', 'city_location' => 'Manchester'),
            array('qty' => '1', 'needed_job' => 'BE', 'city_location' => 'Londo'),
        );
        $phpWord->cloneBlock('table_block_placeholder', 0, true, false, $replc);
        $tempFilePath = tempnam(sys_get_temp_dir(), 'Surat_Penawaran');
        $phpWord->saveAs($tempFilePath);
        $headers = [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'Content-Disposition' => 'attachment; filename="Surat_Penawaran.docx"',
        ];
        return response()->file($tempFilePath, $headers);
    }




















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
}
