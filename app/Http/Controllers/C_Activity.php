<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ActivityModel;
use App\Models\M_Activity;

class C_Activity extends Controller
{
    public function appointment(Request $request, $leads_id){
        $field = $request->validate([
            'judul'=>'required',
            'lokasi'=>'required',
            'waktu'=>'required',
            'deskripsi'=>'required',
        ]);
        
        $activity = M_Activity::create([
            'activity_type_id'=>'8',
            'leads_id'=>$leads_id,
            'xs1'=>$field['judul'],
            'xs2'=>$field['lokasi'],
            'xd'=>$field['waktu'],
            'desc'=>$field['deskripsi'],
        ]);
        
        if(!$activity) return response([
            'error' => 'Error Occured',
        ]);
        return redirect('/leads')->with('success', 'Data berhasil ditambahkan.');
    }
    public function note(Request $request, $leads_id){
        $field = $request->validate([
            'deskripsinote'=>'required'
        ]);
        
        $activity = M_Activity::create([
            'activity_type_id'=>'9',
            'leads_id'=> $leads_id,
            'desc'=>$field['deskripsinote'],
        ]);
        
        if(!$activity) return response([
            'error' => 'Error Occured'
        ]);
        return redirect('/leads')->with('success', 'Data berhasil ditambahkan.');
    }
    public function report(Request $request, $leads_id){
        $field = $request->validate([
            'judulreport' => 'required',
            'file' => 'required|file',
            'deskripsireport' => 'required',
        ]);
        $activity = M_Activity::create([
            'activity_type_id' => '10',
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

        return redirect('/leads')->with('success', 'Data berhasil ditambahkan.');
    }
}