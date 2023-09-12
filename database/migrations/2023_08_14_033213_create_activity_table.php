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
        Schema::create('activity', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('activity_type_id');
            $table->integer('leads_id');
            $table->string('xs1')->nullable();
            $table->string('xs2')->nullable();
            $table->date('xd')->nullable();
            $table->text('desc') -> nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity');
    }
};
