<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TalentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        foreach(range(1, 10) as $value){
            DB::table('talents')->insert([
                'name' => $faker->name(),
                'domicile' => $faker->address(),
                'age' => random_int(18, 60),
                'phone_number' => $faker->phoneNumber(),
                'email' => $faker->email(),
            ]);
        }
    }
}
