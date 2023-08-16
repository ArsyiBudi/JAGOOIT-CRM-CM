<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TalentDetailTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $talent_detail_types = array(
            "Posisi", "Dokumen Legal", "Pengalaman Kerja", "Keterampilan", "Pendidikan", "Level Skill", "Detail Pengalaman Kerja", "Keterampilan Tambahan", "Develop Area", "Kesiapan Bekerja", "Keterampilan Lain" 
    
    );
        foreach(range(0, count($talent_detail_types) - 1)  as $count){
            DB::table('talent_detail_types')->insert([
                'description' => $talent_detail_types[$count]
            ]);
        }
    }
}