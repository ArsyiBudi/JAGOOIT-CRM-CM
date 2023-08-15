<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Talent;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use UserType;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       $this -> call([
        TalentSeeder::class,
        UserTypeSeeder::class,
        UserSeeder::class,
        LeadSeeder::class
       ]);
    }
}
