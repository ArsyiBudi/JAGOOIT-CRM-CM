<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        foreach(range(1, 10) as $value){
            DB::table('users')->insert([
                'user_type_id' => random_int(1, 3),
                'username' => $faker->userName(),
                'password' => 'saya0568',
                'email' => $faker->email(),
                'xs1' => $faker-> name()
            ]);
        }
    }
}