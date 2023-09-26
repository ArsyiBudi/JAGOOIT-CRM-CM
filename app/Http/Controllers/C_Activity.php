<?php

namespace App\Http\Controllers;

use App\Mail\AppoinmentMail;
use App\Mail\TestMail;
use App\Models\M_GlobalParams;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ActivityModel;
use App\Models\M_Activity;
use App\Models\M_Leads;
use Illuminate\Support\Facades\Mail;
use Throwable;

class C_Activity extends Controller
{
    public function fetch_activity($leads_id)
    {
        $lead = M_Leads::find($leads_id);
        return view('admin.leads.activity', [
            'title' => "Leads | Create Activity",
            'lead' => $lead
        ]);
    }
    public function appointment(Request $request, $leads_id){
        $field = $request -> validate([
            'judul'=>'required',
            'lokasi'=>'required',
            'waktu'=>'required',
            'deskripsi'=>'required',
        ]);
        $id_params = new M_GlobalParams;
        $activity = M_Activity::create([
            'activity_type_id'=> $id_params -> appoinmentParam(),
            'leads_id'=>$leads_id,
            'xs1'=>$field['judul'],
            'xs2'=>$field['lokasi'],
            'xd'=>$field['waktu'],
            'desc'=>$field['deskripsi'],
        ]);
        if(!$activity) return response(['Error' => "Data didn't created"]);

        $lead = M_Leads::find($leads_id);
        $mailData = [
            'appoinment' => $activity,
            'lead_data' => $lead, 
            'information' => "Konfirmasi Janji Temu JagooIT "
        ];
        $mailSubject = "Appoinment | JagooIT - {$lead -> business_name}";
        if (!$lead->hasOneEmail) return response(['error' => "No Email detected in {$lead->business_name}"]);

        $email = new AppoinmentMail($mailData, $mailSubject);
        if($request->hasFile('attachment')) {
            $file = $request->file('attachment');
            $email->attach($file->getRealPath(), [
                'as' => $file->getClientOriginalName(),
                'mime' => $file->getMimeType(),
            ]);
        }
        try{
            Mail::to($request->email_name)->send($email);
        }catch(Throwable $e){
            $activity -> delete();
            return back() -> with('error', "Terjadi error saat mengirim email, mohon coba lagi");
        }
        
        return redirect("/leads/$leads_id/detail")->with('success', 'Appointment terkirim.');
    }
    
    public function note(Request $request, $leads_id){
        $field = $request->validate([
            'deskripsinote'=>'required'
        ]);
        $id_params = new M_GlobalParams;
        $activity = M_Activity::create([
            'activity_type_id'=> $id_params -> notesParam(),
            'leads_id'=> $leads_id,
            'desc'=>$field['deskripsinote'],
        ]);
        
        if(!$activity) return response([
            'error' => 'Error Occured'
        ]);
        return redirect("/leads/$leads_id/detail")->with('success', 'Notes tersimpan.');    
    }
    public function report(Request $request, $leads_id){
        $field = $request->validate([
            'judulreport' => 'required',
            'file' => 'required|file',
            'deskripsireport' => 'required',
        ]);
        $id_params = new M_GlobalParams;
        $activity = M_Activity::create([
            'activity_type_id' => $id_params -> reportParam(),
            'leads_id' => $leads_id,
            'xs1' => $field['judulreport'],
            'xs2' => $field['file'],
            'desc' => $field['deskripsireport'],
        ]);

        if (!$activity) {
            return response([
                'error' => 'Error Occurred during activity creation',
            ]);
        }
        return redirect("/leads/$leads_id/detail")->with('success', 'Report terkirim.');
    }
}