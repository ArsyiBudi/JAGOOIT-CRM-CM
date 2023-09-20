<?php

namespace App\Http\Controllers;

use App\Mail\AppoinmentMail;
use App\Mail\TestMail;
use App\Models\M_Activity;
use App\Models\M_Leads;
use App\Models\M_Offer;
use App\Models\M_Popks;
use App\Models\M_Orders;
use App\Models\M_Talents;
use Nette\Utils\DateTime;
use Illuminate\Http\Request;
use App\Models\M_OrderDetails;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Models\M_OfferLetterJobsDetails;
use PhpOffice\PhpWord\TemplateProcessor;
use Spatie\Backtrace\Backtrace;
use Throwable;

class C_Plan extends Controller
{

    //?BELOW ARE USED FOR HANDLING ERROR { IT'S NOT AN ERROR IT'S A FEATURE}

        //?BELOW ARE USED TO CHECK IF THE END AND START IS FIX
        public function checkEndStart($order_id, $timeline)
        {
            $track = ['recruitment', 'training', 'offer', 'appointment', 'probation', 'popks'];
            $strWhere = 'start_' . $track[$timeline - 1];
            $check_timeline = M_Orders::find($order_id);
            if (is_null($check_timeline->$strWhere)) return "";
            return "ok";
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
            $routes = ['', 'recruitment', 'training', 'penawaran', 'negosiasi', 'percobaan', 'popks', 'popks', ''];
            return redirect("/client/order/plan/$order_id/{$routes[$order->order_status]}");
        }

    //?BELOW ARE USED FOR GENERATING WORD FILE
    public function generateWordOffer($offer_letter_id)
    {
        $offer = M_Offer::find($offer_letter_id);
        $phpWord = new TemplateProcessor('template.docx');
        $phpWord->setValue('no_surat', $offer->letter_number);
        $phpWord->setValue('perihal', $offer->offer_subject);
        $phpWord->setValue('kepada', $offer->recipient_name);
        $phpWord->setValue('tempat', $offer->location);
        $phpWord->setValue('tanggal', $offer->date);
        $phpWord->setValue('ditawarkan', $offer->context);
        $phpWord->setValue('jumlahTalent', $offer->talent_total);
        $phpWord->setValue('weekday', $offer->weekday_cost);
        $phpWord->setValue('weekend', $offer->weekend_cost);
        $phpWord->setValue('konsumsi', $offer->consumption_cost);
        $phpWord->setValue('transPP', $offer->transportation_cost);
        $replc = [];
        foreach ($offer->offerJobDetails as $detail) {
            $replc[] = [
                'quantity' => $detail->quantity,
                'needed_job' => $detail->needed_job,
                'city_location' => $detail->city_location,
                'contract_duration' => $detail->contract_duration,
                'price' => $detail->price,
                'price_total' => ($detail->price * $detail->contract_duration) * $detail->quantity
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

    public function generateWordPopks($order_id, $popks_letter_id, $currentDate)
    {
        $order = M_Orders::find($order_id);
        $offer = M_Offer::find($order->offer_letter_id);
        $popks = M_Popks::find($popks_letter_id);
        $toDate = Carbon::parse($popks->end_date);
        $fromDate = Carbon::parse($popks->start_date);
        $months = $toDate->diffInMonths($fromDate);
        $years = $currentDate->format('Y');
        $date = $currentDate->format('d');

        //?GENERATE CURRENT DATE
        setlocale(LC_TIME, 'id_ID');
        $dayName = Carbon::parse($currentDate)->isoFormat('dddd');
        $monthName = Carbon::parse($currentDate)->isoFormat('MMMM');

        $phpWord = new TemplateProcessor('draft_popks.docx');
        $phpWord->setValue('create_date', "hari {$dayName}, tanggal {$date} bulan {$monthName} tahun {$years}");
        $phpWord->setValue('letter_numbers', $popks->letter_numbers);
        $phpWord->setValue('client_company', $popks->leadData->business_name);
        $phpWord->setValue('client_name', $popks->client_name);
        $phpWord->setValue('client_position', $popks->client_position);
        $phpWord->setValue('client_address', $popks->client_address);
        $phpWord->setValue('employee_name', $popks->employee_name);
        $phpWord->setValue('employee_position', $popks->employee_position);
        $phpWord->setValue('employee_address', $popks->employee_address);
        $phpWord->setValue('month', $months);
        $phpWord->setValue('start_date', $popks->start_date);
        $phpWord->setValue('end_date', $popks->end_date);
        $phpWord->setValue('included_fees', $popks->included_fees);
        $phpWord->setValue('nominal_fees', $popks->nominal_fees);
        $phpWord->setValue('weekday_cost', $popks->weekday_cost);
        $phpWord->setValue('weekend_cost', $popks->weekend_cost);
        $phpWord->setValue('notes', $popks->notes);
        $phpWord->setValue('consumption_cost', $popks->consumption_cost);
        $phpWord->setValue('transportation_cost', $popks->transportation_cost);
        $phpWord->setValue('billing_due_date', $popks->billing_due_date);
        $phpWord->setValue('billing_days', $popks->billing_days);
        $phpWord->setValue('authorized_by', $popks->authorized_by);
        $phpWord->setValue('account_number', $popks->account_number);
        $phpWord->setValue('bank_name', $popks->bank_name);
        $phpWord->setValue('jagooit_director', $popks->jagoit_director);
        $phpWord->setValue('client_director', $popks->client_director);
        $phpWord->setValue('selectedYear', $years);
        $replc = '';
        foreach ($offer->offerJobDetails as $detail) {
            $replc .= $detail->quantity . ' orang ' . $detail->needed_job . ', ';
        }
        $replc = rtrim($replc, ', ');
        $phpWord->setValue('jobDetails', $replc);

        $tempFilePath = tempnam(sys_get_temp_dir(), 'DRAFT PKS');
        $phpWord->saveAs($tempFilePath);
        $headers = [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'Content-Disposition' => 'attachment; filename="Draft PKS.docx"',
        ];

        return response()->file($tempFilePath, $headers);
    }

    //?BELOW ARE TO FETCH A DATA
    public function fetchRecruitment(Request $request, $order_id)
    {
        $check = M_Orders::find($order_id);
        if (!$check) return back() -> with('error', "Tidak ada order dengan ID : $order_id");

        $search = $request->input('search', '');
        session(['talent_search' => $search]);
        $search = session('talent_search', '');
        $talent = M_Talents::where(function ($query) use ($search) {
            $query->where('name', 'like', "%$search%")
                ->orWhereHas('posisiTalent', function ($query) use ($search) {
                    $query->where('description', 'like', "%$search%");
                })
                ->orWhereHas('keterampilanTalent', function ($query) use ($search) {
                    $query->where('description', 'like', "%$search%");
                })
                ->orWhereHas('pendidikanTalent', function ($query) use ($search) {
                    $query->where('description', 'like', "%$search%");
                });
        })->where('is_active', '=', '0')->paginate(5);
        return view('admin.client.plan.recruitment', [
            "title" => "Plan | Recruitment",
            'talents' => $talent,
            "order_id" => $order_id
        ]);
    }

    public function fetchTraining(Request $request, $order_id)
    {
        $check = M_Orders::find($order_id);
        if (!$check) return back() -> with('error', "Tidak ada order dengan ID : $order_id");

        $order = M_Orders::find($order_id);
        $searchQuery = $request->input('search', '');
        session(['talent_search' => $searchQuery]);
        $searchQuery = session('talent_search', '');
        $query = M_OrderDetails::where('order_id', $order->id);

        if (!empty($searchQuery)) {
            $query->whereHas('talentData', function ($q) use ($searchQuery) {
                $q->where('name', 'LIKE', '%' . $searchQuery . '%');
            });
        }

        $talent = $query->paginate(5);

        return view('admin.client.plan.training', [
            "title" => "Plan | Training",
            "datas" => $talent,
            "order" => $order,
        ]);
    }
    public function fetchOffer($order_id)
    {
        $check = M_Orders::find($order_id);
        if (!$check) return back() -> with('error', "Tidak ada order dengan ID : $order_id");

        $order = M_Orders::find($order_id);
        if (is_null($order->offer_letter_id)) {
            $offer = M_Offer::create();
            $order->offer_letter_id = $offer->id;
            $order->update();
        }
        $offer = M_Offer::find($order->offer_letter_id);
        return view('admin.client.plan.penawaran', [
            "title" => "Plan | Penawaran",
            "offer" => $offer,
            "order" => $order
        ]);
    }
    public function fetchNegosiasi($order_id)
    {
        $check = M_Orders::find($order_id);
        if (!$check) return back() -> with('error', "Tidak ada order dengan ID : $order_id");
        
        $order = M_Orders::find($order_id);
        if (is_null($order->appoinment_activity_id)) {
            $appoinment = M_Activity::create([
                'activity_type_id' => 9,
                'leads_id' => $order->leads_id
            ]);
            $order->appoinment_activity_id = $appoinment->id;
            $order->update();
        }
        $appointment = M_Activity::find($order->appoinment_activity_id);
        return view('admin.client.plan.negosiasi', [
            "title" => "Plan | Negosiasi",
            "order" => $order,
            "negosiasi" => $appointment
        ]);
    }
    public function fetchPercobaan(Request $request, $order_id)
    {
        $order = M_Orders::find($order_id);
        if (!$order) return back() -> with('error', "Tidak ada order dengan ID : $order_id");

        $searchQuery = $request->input('search', '');
        session(['talent_search' => $searchQuery]);
        $searchQuery = session('talent_search', '');
        $query = M_OrderDetails::where('order_id', $order->id);

        if (!empty($searchQuery)) {
            $query->where(function ($subquery) use ($searchQuery) {
                $subquery->whereHas('talentData', function ($q) use ($searchQuery) {
                    $q->where('name', 'LIKE', '%' . $searchQuery . '%');
                })->orWhereHas('talentData.pendidikanTalent', function ($q) use ($searchQuery) {
                    $q->where('description', 'LIKE', '%' . $searchQuery . '%');
                })->orWhereHas('talentData.keterampilanTalent', function ($q) use ($searchQuery) {
                    $q->where('description', 'LIKE', '%' . $searchQuery . '%');
                })->orWhereHas('talentData.posisiTalent', function ($q) use ($searchQuery) {
                    $q->where('description', 'LIKE', '%' . $searchQuery . '%');
                });
            });
        }

        $talent = $query->paginate(5);
        return view('admin.client.plan.percobaan', [
            "title" => "Plan | Percobaan",
            "order_id" => $order_id,
            "talents" => $talent
        ]);
    }

    public function fetchPopks($order_id)
    {
        $order = M_Orders::find($order_id);
        if (!$order) return back() -> with('error', "Tidak ada order dengan ID : $order_id");

        if (is_null($order->popks_letter_id)) {
            $popks = M_Popks::create([
                'leads_id' => $order->leadData->id
            ]);
            $order->popks_letter_id = $popks->id;
            $order->update();
        }
        $popks = M_Popks::find($order->popks_letter_id);
        return view('admin.client.plan.popks', [
            "title" => "Plan | POPKS",
            "field" => $popks,
            "order" => $order
        ]);
    }


    //?RECRUITMENT PLAN CODE
    public function saveRecruitment(Request $request, $order_id)
    {
        if ($this->checkEndStart($order_id, 1) == 'ok') {
            $selectedTimestamp = time();
            $selectedDate = new DateTime();
            $selectedDate->setTimestamp($selectedTimestamp);
            $updateOrder = M_Orders::find($order_id);
            $updateOrder->order_status = 2;

            $talentsCount = 0;
            if (!is_null($request->talents_id)) {
                foreach ($request->talents_id as $talent_id) {
                    M_OrderDetails::create([
                        'talent_id' => $talent_id,
                        'order_id' => $order_id
                    ]);
                    $update = M_Talents::find($talent_id);
                    $update->is_active = 1;
                    $update->save();
                }
                $talentsCount = count($request->talents_id);
            }

            if (is_null($updateOrder->end_recruitment) && is_null($updateOrder->start_training)) {
                $updateOrder->end_recruitment = $selectedDate;
                $updateOrder->start_training = $selectedDate;
            }
            $updateOrder->save();
            if($talentsCount != 0) return redirect('/client/order/plan/' . $order_id . '/training/')->with('success', "Berhasil menambahkan $talentsCount talent");
            return redirect('/client/order/plan/' . $order_id . '/training/')->with('success', "Berhasil menyelesaikan Recruitment");

        } else {
            return back()->with('error', "Timeline anda belum selesai, mohon selesaikan terlebih dahulu");
        }
    }

    //?TRAINING PLAN CODE
    public function addGrade(Request $request, $order_id, $order_details_id)
    {
        $order_detail = M_OrderDetails::find($order_details_id);
        if (!$order_detail) return back() -> with('error', "$order_id");

        $order_detail->pre_score = $request->pre_score;
        $order_detail->post_score = $request->post_score;
        $order_detail->group_score = $request->group_score;
        $order_detail->final_score = $request->final_score;
        $status = $order_detail->update();
        if (!$status) return response(['error' => "Data didn't updated"]);
        return back()->with('success', "Nilai {$order_detail->talentData->name} berhasil diupdate");
    }
    public function saveTraining($order_id)
    {
        if ($this->checkEndStart($order_id, 2) == "ok") {
            $selectedTimestamp = time();
            $selectedDate = new DateTime();
            $selectedDate->setTimestamp($selectedTimestamp);

            $update = M_Orders::find($order_id);
            $update->order_status = 3;
            if (is_null($update->end_training) && is_null($update->start_offer)) {
                $update->end_training = $selectedDate;
                $update->start_offer = $selectedDate;
            }
            $status = $update->update();
            if ($status) return redirect('/client/order/plan/' . $order_id . '/penawaran/')->with('success', "Berhasil menyelesaikan Training");
        } else {
            return back()->with('error', "Timeline anda belum selesai, mohon selesaikan terlebih dahulu");
        }
    }

    //?OFFER PLAN CODE

    public function addOfferDetails(Request $request, $order_id)
    {
        $field = $request->validate([
            'needed_job' => 'required',
            'quantity' => 'required',
            'city_location' => 'required',
            'contract_duration' => 'required',
            'price' => 'required'
        ]);
        $order = M_Orders::find($order_id);
        $offer_details = M_OfferLetterJobsDetails::create([
            'offer_letters_id' => $order->offer_letter_id,
            'needed_job' => $field['needed_job'],
            'quantity' => $field['quantity'],
            'city_location' => $field['city_location'],
            'contract_duration' => $field['contract_duration'],
            'price' => $field['price']
        ]);

        if (!$offer_details)
            return response(['error' => "Data didn't created"]);
        return back();
    }

    public function deleteOfferDetails($order_id, $offer_job_detail_id)
    {
        $delete = M_OfferLetterJobsDetails::find($offer_job_detail_id);
        $delete->delete();
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
        if (!$input)
            return response(['error' => 'error'], 404);

        $order = M_Orders::find($order_id);
        $offer = M_Offer::find($order->offer_letter_id);
        if (!$offer)
            return response([
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
        $status = $offer->save();
        if (!$status) {
            return response([
                'error' => "Data didn't updated"
            ]);
        } else {
            $status = $this->generateWordOffer($order->offer_letter_id);
            if ($status)
                return $status;
        }
        return redirect()->back();
    }

    public function offer_send(Request $request, $order_id)
    {
        $field = $request->validate([
            'cv_desc' => 'required',
        ]);
        if (!$field)
            return back()->with('error', 'Please Fill are the field');
        $order = M_Orders::find($order_id);
        $order->cv_file = $request->file('cv_file');
        $order->cv_description = $field['cv_desc'];
        $status = $order->update();

        if ($status) {
            $lead = M_Leads::find($order->leads_id);
            $mailData = [
                'description' => $field['cv_desc'],
                'lead_data' => $lead,
                'information' => "Proposal Penawaran dan CV Talenta"
            ];
            $mailSubject = "Penawaran Order {$order->id} | JagooIT - {$lead->business_name}";
            if (!$lead->hasOneEmail) return back() -> with('error', "{$lead -> business_name} tidak memiliki email");

            $email = new TestMail($mailData, $mailSubject);
            if ($request->hasFile('cv_file')) {
                $file = $request->file('cv_file');
                $email->attach($file->getRealPath(), [
                    'as' => $file->getClientOriginalName(),
                    'mime' => $file->getMimeType(),
                ]);
            }
            try{
                Mail::to($request->email_name)->send($email);
            }catch(Throwable $e){
                return back() -> with('error', "Terjadi error saat mengirim email, mohon coba kembali");
            }
            return redirect()->back()->with('success', "Email berhasil terkirim");
        }
    }

    public function offer_save($order_id)
    {
        if ($this->checkEndStart($order_id, 3) == "ok") {
            $currentTimestamp = time();
            $selectedDate = new DateTime();
            $selectedDate->setTimestamp($currentTimestamp);

            $offer = M_Offer::create();
            $update = M_Orders::find($order_id);
            $update->offer_letter_id = $offer->id;
            $update->order_status = 3;
            $update->end_offer = $selectedDate;
            $update->start_appointment = $selectedDate;
            $status = $update->update();
            if ($status) return redirect('/client/order/plan/' . $order_id . '/negosiasi');
        } else {
            return back()->with('error', "Timeline anda belum selesai, mohon selesaikan terlebih dahulu");
        }
    }


    //?NEGOSIASI CONTROLLER CODE
    public function submitNegosiasi(Request $request, $order_id)
    {
        $field = $request->validate([
            'judul' => 'required',
            'lokasi' => 'required',
            'waktu' => 'required',
            'deskripsi' => 'required',
        ]);

        $order = M_Orders::find($order_id);
        $activity = M_Activity::find($order->appoinment_activity_id);
        if (!$activity) return response(['error' => 'No activity tracked ']);

        $activity->xs1 = $field['judul'];
        $activity->xs2 = $field['lokasi'];
        $activity->xd = $field['waktu'];
        $activity->desc = $field['deskripsi'];
        $status = $activity->update();
        if (!$status) return response(['error' => "Data didn't update"]);

        $mailData = [
            'appoinment' => $activity,
            'lead_data' => $order->leadData,
            'information' => "Konfirmasi Janji Temu JagooIT "
        ];
        $mailSubject = "Pertemuan Negosiasi | JagooIT - {$order->leadData->business_name}";
        if (!$order->leadData->hasOneEmail) return response(['error' => "No Email detected in {$order->leadData->business_name}"]);

        $email = new AppoinmentMail($mailData, $mailSubject);
        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');
            $email->attach($file->getRealPath(), [
                'as' => $file->getClientOriginalName(),
                'mime' => $file->getMimeType(),
            ]);
        }
        try{
            Mail::to($request->email_name)->send($email);
        }catch(Throwable $e){
            return back() -> with('error', "Terjadi error saat mengirim email, mohon coba kembali");
        }

        return back()->with('success', 'Email berhasil terkirim');
    }

    public function saveNegosiasi($order_id)
    {
        if ($this->checkEndStart($order_id, 4) == "ok") {
            $currentTimestamp = time();
            $selectedDate = new DateTime();
            $selectedDate->setTimestamp($currentTimestamp);
            $update = M_Orders::find($order_id);
            $update->order_status = 4;
            if (is_null($update->end_appointment) && is_null($update->start_probation)) {
                $update->end_appointment = $selectedDate;
                $update->start_probation = $selectedDate;
            }
            $status = $update->update();
            if ($status)
                return redirect('/client/order/plan/' . $order_id . '/percobaan/') -> with('success');
        } else {
            return back()->with('error', "Timeline anda belum selesai, mohon selesaikan terlebih dahulu");
        }
    }

    //?PERCOBAAN CONTROLLER CODE
    public function savePercobaan(Request $request, $order_id)
    {
        if ($this->checkEndStart($order_id, 5) == "ok") {
            $currentTimestamp = time();
            $selectedDate = new DateTime();
            $selectedDate->setTimestamp($currentTimestamp);
            $update = M_Orders::find($order_id);
            $update->order_status = 5;
            if (!is_null($request->talents_id)) {
                foreach ($request->talents_id as $talent_id) {
                    $updateTalent = M_OrderDetails::find($talent_id);
                    $updateActive = M_Talents::find($updateTalent->talent_id);
                    $updateActive->is_active = 0;
                    $updateTalent->recruitment_status = 1;
                    $updateActive->save();
                    $updateTalent->save();
                }
            }
            if (is_null($update->end_probation) && is_null($update->start_popks)) {
                $update->end_probation = $selectedDate;
                $update->start_popks = $selectedDate;
            }
            $status = $update->update();
            if ($status)
                return redirect('/client/order/plan/' . $order_id . '/popks/');
        } else {
            return back()->with('error', "Timeline anda belum selesai, mohon selesaikan terlebih dahulu");
        }
    }
    public function deletePercobaan($order_id, $talent_id)
    {
        $delete = M_OrderDetails::find($talent_id);
        $updateActive = M_Talents::find($delete->talent_id);
        $updateActive->is_active = 0;
        $updateActive->save();
        $delete->delete();
        return redirect()->back()->with('success', "{$updateActive -> name} berhasil dihapus dari order dengan ID : $order_id");
    }

    //?POPKS CONTROLLER CODE
    public function popks_create(Request $request, $order_id)
    {
        $selectedTimestamp = time();
        $selectedDate = new DateTime();
        $selectedDate->setTimestamp($selectedTimestamp);
        $selectedMonth = $selectedDate->format('m');
        $selectedYear = $selectedDate->format('Y');

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

        if (!$field)
            return response([
                'error' => 'error'
            ]);

        $order = M_Orders::find($order_id);
        $popks = M_Popks::find($order->popks_letter_id);
        $popks->letter_numbers = "{$popks->id}/JTI/PKS.{$selectedMonth}/{$selectedYear}";
        $popks->leads_id = $order->leads_id;
        $popks->employee_name = $field['employee_name'];
        $popks->employee_position = $field['employee_position'];
        $popks->employee_address = $field['employee_address'];
        $popks->client_name = $field['client_name'];
        $popks->client_position = $field['client_position'];
        $popks->client_address = $field['client_address'];
        $popks->start_date = $field['start_date'];
        $popks->end_date = $field['end_date'];
        $popks->nominal_fees = $field['nominal_fees'];
        $popks->included_fees = $field['included_fees'];
        $popks->weekday_cost = $field['weekday_cost'];
        $popks->weekend_cost = $field['weekend_cost'];
        $popks->notes = $field['notes'];
        $popks->consumption_cost = $field['consumption_cost'];
        $popks->transportation_cost = $field['transportation_cost'];
        $popks->billing_due_date = $field['billing_due_date'];
        $popks->billing_days = $field['billing_days'];
        $popks->authorized_by = $field['authorized_by'];
        $popks->account_number = $field['account_number'];
        $popks->bank_name = $field['bank_name'];
        $popks->jagoit_director = $field['jagoit_director'];
        $popks->client_director = $field['client_director'];
        $status = $popks->save();

        if (!$status) {
            return response([
                'error' => "Data didn't updated"
            ]);
        } else {
            $generate = $this->generateWordPopks($order_id, $order->popks_letter_id, $selectedDate);
            if ($generate)
                return $generate;
        }
        return redirect()->back();
    }


    public function popks_send(Request $request, $order_id)
    {
        $field = $request->validate([
            'po_descr' => 'required',
        ]);

        if (!$field) return back() -> with('error', "Mohon isi field yang ada"); 

        $order = M_Orders::find($order_id);

        //?Handling error, when offer_letter_id is not generated.
        if (is_null($order->offer_letter_id)) return response(['error' => 'No offer letter, please go to plan number 3 to generate offer letter']);

        $order->po_file = $request->file('file-pks');
        $order->po_description = $field['po_descr'];
        $status = $order->update();

        if ($status) {
            $lead = M_Leads::find($order->leads_id);
            $mailData = [
                'description' => $field['po_descr'],
                'lead_data' => $lead,
                'information' => "PKS Talenta Indonesia"
            ];
            $mailSubject = "Draft POPKS JagooIT - {$lead->business_name}";
            if (!$lead->hasOneEmail) return back() -> with('error', "No Email detected in {$lead->business_name}");

            $email = new TestMail($mailData, $mailSubject);

            if ($request->hasFile('file-pks')) {
                $file = $request->file('file-pks');
                $email->attach($file->getRealPath(), [
                    'as' => $file->getClientOriginalName(),
                    'mime' => $file->getMimeType(),
                ]);
            }
            try{
                Mail::to($request->email_name)->send($email);
            }catch(Throwable $e){
                return back() -> with('error', "Terjadi error saat mengirim email, mohon coba kembali");
            }
            return redirect()->back()->with('success', 'Email berhasil terkirim');
        }
    }

    public function popks_save($order_id)
    {
        if ($this->checkEndStart($order_id, 6) == "ok") {
            $currentTimestamp = time();
            $selectedDate = new DateTime();
            $selectedDate->setTimestamp($currentTimestamp);
            $offer = M_Offer::create();
            $update = M_Orders::find($order_id);
            $update->offer_letter_id = $offer->id;
            $update->order_status = 7;

            if (is_null($update->end_popks)) {
                $update->end_popks = $selectedDate;
            }
            $status = $update->update();
            if ($status)
                return redirect('/client/order');
        } else {
            return back()->with('error', "Timeline anda belum selesai, mohon selesaikan terlebih dahulu");
        }
    }
}
