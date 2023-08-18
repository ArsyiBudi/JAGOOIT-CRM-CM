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
        Schema::create('offer_letters', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('letter_number');
            $table->date('date');
            $table->string('location');
            $table->string('offer_subject');
            $table->string('recipient_name');
            $table->string('context');
            $table->integer('talent_total');
            $table->integer('weekday_cost');
            $table->integer('weekend_cost');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offer_letters');
    }
};
