<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class LeadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        foreach(range(1, 10) as $value){
            DB::table('leads')->insert([
                'business_name' => $faker->domainName(),
                'business_sector' => 'IT Support',
                'address' => $faker->streetName(),
                'pic_name' => $faker->name(),
                'pic_contact_number' => $faker->phoneNumber()
            ]);
        }
    }
}
