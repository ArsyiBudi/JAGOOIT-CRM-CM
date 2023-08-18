<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TalentDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $description_value = array(
            array('Frontend Dev', 'Backend Dev', 'Full-Stack Dev', 'IT Support', 'Dev Ops', 'Data Analyst'), // Position
            array('C++', 'PHP', 'JS', 'Python', 'HTML + CSS'), // Keterampilan
            array('SMA-SMK', 'S1', 'S2', 'S3', 'D2', 'D3') // Pendidikan 
        );
    
        foreach (range(1, 10) as $count) {
            foreach (range(0, 2) as $count_desc) {
                $id_talent_details = 1;
                if ($count_desc == 1) $id_talent_details = 4;
                if ($count_desc == 2) $id_talent_details = 5; 
    
                DB::table('talent_details')->insert([
                    'id_talent' => $count,
                    'id_talent_details' => $id_talent_details,
                    'description' => $description_value[$count_desc][random_int(0, count($description_value[$count_desc]) - 1)]
                ]);
            }
        }
    }
}