<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpWord\TemplateProcessor;

class PenawaranWordController extends Controller
{
    //
    public function generate(Request $request)
    {
        $input = $request->all();

        $phpWord = new \PhpOffice\PhpWord\TemplateProcessor('template.docx');

        $phpWord->setValue('perihal', $input['offer_subject']);
        $phpWord->setValue('kepada', $input['recipient_name']);
        $phpWord->setValue('tempat', $input['location']);
        $phpWord->setValue('tanggal', $input['date']);
        $phpWord->setValue('ditawarkan', $input['context']);
        $phpWord->setValue('jumlahTalent', $input['talent_total']);
        $phpWord->setValue('weekday', $input['weekday_cost']);
        $phpWord->setValue('weekend', $input['weekend_cost']);
        $phpWord->setValue('konsumsi', $input['consumtion_cost']);
        $phpWord->setValue('transPP', $input['transportation_cost']);

        $replc = array(
                array('qty'=> '12', 'needed_job'=> 'be', 'city_location' => 'Liverpool'),
                array('qty'=> '11', 'needed_job'=> 'fe', 'city_location' => 'Manchester'),
                array('qty'=> '1', 'needed_job'=> 'be', 'city_location' => 'Londo'),
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