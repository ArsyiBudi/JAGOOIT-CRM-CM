<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ParamsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $params = array(
            "Recruitment", "Training", "Penawaran", "Appointment Negoisasi", "Masa Percobaan", "PO & PKS", //order_status
            "Appointment", "Notes", "Report", //activity_type
            "New", "Offering", "Interested", "Order" //lead_status
        );
        foreach(range(0, count($params) - 1)  as $count){
            DB::table('global_params')->insert([
                'params_name' => $params[$count]
            ]);
        }
    }
}