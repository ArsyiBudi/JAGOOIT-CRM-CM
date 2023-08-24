<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ActivityModel;

class C_Activity extends Controller
{
    public function appointment(Request $request){
        $field = $request->validate([
            'judul'=>'required',
            'lokasi'=>'required',
            'waktu'=>'required',
            'deskripsi'=>'required',
        ]);
        
        $activity = ActivityModel::create([
            'activity_type_id'=>'1',
            'leads_id'=>'1',
            'xs1'=>$field['judul'],
            'xs2'=>$field['lokasi'],
            'xd'=>$field['waktu'],
            'desc'=>$field['deskripsi'],
        ]);
        
        if(!$activity) return response([
            'error' => 'Error Occured',
        ]);
        return redirect('/leads/detail')->with('success', 'Data berhasil ditambahkan.');
    }
    public function note(Request $request){
        $field = $request->validate([
            'deskripsinote'=>'required'
        ]);
        
        $activity = ActivityModel::create([
            'activity_type_id'=>'2',
            'leads_id'=>'3',
            'xs1'=>null,
            'xs2'=>null,
            'xd'=>null,
            'desc'=>$field['deskripsinote'],
        ]);
        
        if(!$activity) return response([
            'error' => 'Error Occured'
        ]);
        return redirect('/leads/detail')->with('success', 'Data berhasil ditambahkan.');
    }
    public function report(Request $request){
        $field = $request->validate([
            'judulreport' => 'required',
            'file' => 'required|file',
            'deskripsireport' => 'required',
        ]);

        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $filePath = $file->storeAs($fileName);

        $activity = ActivityModel::create([
            'activity_type_id' => '3',
            'leads_id' => '4',
            'xs1' => $field['judulreport'],
            'xs2' => $filePath,
            'xd' => null,
            'desc' => $field['deskripsireport'],
        ]);

        if (!$activity) {
            return response([
                'error' => 'Error Occurred during activity creation',
            ]);
        }

        return redirect('/leads/detail')->with('success', 'Data berhasil ditambahkan.');
    }
}