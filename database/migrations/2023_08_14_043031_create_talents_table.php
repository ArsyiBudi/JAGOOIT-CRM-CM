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
            $table->string('pob_talent') -> nullable();
            $table->date('dob_talent') -> nullable();
            $table->integer('age');
            $table->integer('gender') -> nullable();
            $table->integer('religion') -> nullable();
            $table->string('image') -> nullable();
            $table->integer('level') -> nullable();
            $table->string('phone_number');
            $table->string('email');
            $table->string('signature') -> nullable();
            $table->integer('status_onboard') -> nullable();
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
