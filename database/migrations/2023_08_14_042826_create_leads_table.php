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
        Schema::create('leads', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('business_name');
            $table->string('business_sector');
            $table->text('address');
            $table->string('pic_name');
            $table->string('pic_contact_number');
            $table->boolean('client_indicator')->default(false);
            $table->integer('lead_status')->default(11);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
