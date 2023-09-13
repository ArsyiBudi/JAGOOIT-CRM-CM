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
        Schema::create('order_details', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('talent_id');
            $table->string('order_id');
            $table->double('pre_score') -> nullable();
            $table->double('post_score') ->nullable();
            $table->double('group_score') ->nullable();
            $table->double('final_score') ->nullable();
            $table->boolean('recruitment_status') ->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
