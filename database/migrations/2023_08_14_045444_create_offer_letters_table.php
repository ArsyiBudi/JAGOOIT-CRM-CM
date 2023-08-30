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
            $table->string('letter_number')->nullable();
            $table->string('offer_subject')->nullable();
            $table->string('recipient_name')->nullable();
            $table->string('location')->nullable();
            $table->date('date')->nullable();
            $table->string('context')->nullable();
            $table->integer('talent_total')->nullable();
            $table->integer('weekday_cost')->nullable();
            $table->integer('weekend_cost')->nullable();
            $table->integer('consumption_cost')->nullable();
            $table->integer('transportation_cost')->nullable();
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