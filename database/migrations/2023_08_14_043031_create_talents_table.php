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
        Schema::create('talents', function (Blueprint $table){
            $table->integer('id', true);
            $table->string('name');
            $table->text('domicile');
            $table->string('pob_talent');
            $table->date('dob_talent');
            $table->integer('age');
            $table->integer('gender');
            $table->integer('religion');
            $table->string('image');
            $table->integer('level');
            $table->integer('phone_number');
            $table->string('email');
            $table->string('signature');
            $table->integer('status_onboard');
            $table->boolean('is_active')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('talents');
    }
};
