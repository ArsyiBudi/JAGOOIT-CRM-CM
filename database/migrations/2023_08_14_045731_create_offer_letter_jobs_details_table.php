<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('offer_letter_jobs_details', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('offer_letters_id');
            $table->string('needed_job');
            $table->integer('quantity');
            $table->string('city_location');
            $table->integer('contract_duration');
            $table->double('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offer_letter_jobs_details');
    }
};