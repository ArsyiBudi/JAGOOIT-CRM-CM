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
        $talent_position = [
            'Frontend Dev', 'Backend Dev', 'Full-Stack Dev', 'IT Support', 'Dev Ops', 'Data Analyst'
        ];
        $talent_skill = [
            'CPP', 'PHP', 'JS', 'Python', 'HTML + CSS'
        ];
        $talent_academy = [
            'SMA-SMK', 'S1', 'S2', 'S3', 'D2', 'D3'
        ];


        foreach(range(1,10)  as $count){
            $callPosition = random_int(0, count($talent_position) - 1);
            DB::table('talent_details')->insert([
                'id_talent' => $count,
                'id_talent_details' => 1,
                'description' => $talent_position = $callPosition
            ]);
        }
        foreach(range(1,10)  as $count){
            $callSkill = random_int(0, count($talent_skill) - 1);
            DB::table('talent_details')->insert([
                'id_talent' => $count,
                'id_talent_details' => 1,
                'description' => $talent_skill = $callSkill
            ]);
        }
        foreach(range(1,10)  as $count){
            $callAcademy = random_int(0, count($talent_academy) - 1);
            DB::table('talent_details')->insert([
                'id_talent' => $count,
                'id_talent_details' => 1,
                'description' => $talent_academy = $callAcademy
            ]);
        }
    }
}