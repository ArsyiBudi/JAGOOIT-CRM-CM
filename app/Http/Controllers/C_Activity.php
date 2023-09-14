<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ActivityModel;
use App\Models\M_Activity;
use App\Models\M_Leads;
use Illuminate\Support\Facades\Mail;

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
        $field = $request->validate([
            'judul'=>'required',
            'lokasi'=>'required',
            'waktu'=>'required',
            'deskripsi'=>'required',
        ]);
        
        $activity = M_Activity::create([
            'activity_type_id'=>'9',
            'leads_id'=>$leads_id,
            'xs1'=>$field['judul'],
            'xs2'=>$field['lokasi'],
            'xd'=>$field['waktu'],
            'desc'=>$field['deskripsi'],
        ]);
        if(!$activity) return response(['Error' => "Data didn't created"]);

        $lead = M_Leads::find($leads_id);
        $mailData = [
            'description' => $request->description,
            'lead_data' => $lead
        ];
        $mailSubject = "Appoinment | JagooIT - {$lead -> business_name}";
        if (!$lead->hasOneEmail) return response(['error' => "No Email detected in {$lead->business_name}"]);

        $email = new TestMail($mailData, $mailSubject);
        if($request->hasFile('attachment')) {
            $file = $request->file('attachment');
            $email->attach($file->getRealPath(), [
                'as' => $file->getClientOriginalName(),
                'mime' => $file->getMimeType(),
            ]);
        }
        Mail::to($request->email_name)->send($email);
        
        if(!$activity) return response([
            'error' => 'Error Occured',
        ]);
        return back()->with('success', 'Appointment terkirim.');
    }
    
    public function note(Request $request, $leads_id){
        $field = $request->validate([
            'deskripsinote'=>'required'
        ]);
        
        $activity = M_Activity::create([
            'activity_type_id'=>'10',
            'leads_id'=> $leads_id,
            'desc'=>$field['deskripsinote'],
        ]);
        
        if(!$activity) return response([
            'error' => 'Error Occured'
        ]);
        return redirect('/leads/'. $leads_id . '/detail')->with('success', 'Data berhasil ditambahkan.');
    }
    public function report(Request $request, $leads_id){
        $field = $request->validate([
            'judulreport' => 'required',
            'file' => 'required|file',
            'deskripsireport' => 'required',
        ]);

        $activity = M_Activity::create([
            'activity_type_id' => '11',
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

        return redirect('/leads/'. $leads_id . '/detail')->with('success', 'Data berhasil ditambahkan.');
    }
}