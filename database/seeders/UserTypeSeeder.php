<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user_type = array("Admin", "Karyawan", "Client");
        foreach(range(0, count($user_type) - 1)  as $count){
            DB::table('user_types')->insert([
                'description' => $user_type[$count]
            ]);
        }
    }
}
