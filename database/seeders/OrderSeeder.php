<?php

namespace Database\Seeders;

use App\Models\M_Leads;
use App\Models\M_Orders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function generateUniqueRandomId()
    {
        $unique = false;
        $randomId = '';
        while (!$unique) {
            $randomId = strtoupper(substr(md5(microtime()), 0, 8));
            if (!M_Orders::where('id', $randomId)->exists()) {
                $unique = true;
            }
        }
        return $randomId;
    }

    public function run(): void
    {
        $faker = Faker::create();
        foreach(range(1, 10)  as $count){
            $order = M_Orders::create([
                'id' => $this -> generateUniqueRandomId(),
                'leads_id' => random_int(1, 10),
                'desired_position' => $faker->jobTitle(),
                'needed_qty' => $faker -> randomDigit(),
                'due_date' => $faker -> dateTime($max = 'now', $timezone = null),
                'description' => $faker -> realText($maxNbChars = 200, $indexSize = 2),
                'characteristic_desc' => $faker -> realText($maxNbChars = 200, $indexSize = 2),
                'skills_desc' => $faker -> bs(),
                'budget_estimation' => $faker -> randomDigit(),
            ]);

            $lead = M_Leads::find($order -> leads_id);
            $lead -> client_indicator = 1;
            $lead -> update();
        }
    }
}
