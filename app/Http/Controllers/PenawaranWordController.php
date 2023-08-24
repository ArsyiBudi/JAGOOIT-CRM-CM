<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenawaranWordController extends Controller
{
    //
    public function generate(Request $request) 
    {
        $input = $request->all();
        $phpWord = new \PhpOffice\PhpWord\TemplateProcessor('template.docx');
        
        $phpWord->setValue('perihal', $input['perihal']); 
        $phpWord->setValue('kepada', $input['kepada']); 
        $phpWord->setValue('tempat', $input['tempat']); 
        $phpWord->setValue('tanggal', $input['tanggal']); 
        $phpWord->setValue('ditawarkan', $input['ditawarkan']); 
        $phpWord->setValue('jumlahTalent', $input['jumlahTalent']); 
        $phpWord->setValue('weekday', $input['weekday']); 
        $phpWord->setValue('weekend', $input['weekend']); 
        $phpWord->setValue('konsumsi', $input['konsumsi']); 
        $phpWord->setValue('transPP', $input['transPP']); 

    
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