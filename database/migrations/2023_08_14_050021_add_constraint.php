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
        //Contraint for Users
        Schema::table('users', function($table) {
            $table->foreign('user_type_id')->references('id')->on('user_types');
        });

        //Constraint for Leads
        Schema::table('leads', function($table) {
            $table->foreign('lead_status')->references('id_params')->on('global_params');
        });
        Schema::table('emails', function($table) {
            $table->foreign('leads_id')->references('id')->on('leads');
        });
        Schema::table('orders', function($table) {
            $table->foreign('leads_id')->references('id')->on('leads');
        });
        Schema::table('activity', function($table) {
            $table->foreign('leads_id')->references('id')->on('leads');
        });

        //Constraint for Orders
        Schema::table('orders', function($table) {
            $table->foreign('offer_letter_id')->references('id')->on('offer_letters');
        });
        Schema::table('orders', function($table) {
            $table->foreign('order_status')->references('id_params')->on('global_params');
        });
        Schema::table('orders', function($table) {
            $table->foreign('popks_letter_id')->references('id')->on('popks_letter');
        });
        Schema::table('order_details', function($table) {
            $table->foreign('order_id')->references('id')->on('orders');
        });

        //Constraint for Order_Details
        Schema::table('order_details', function($table) {
            $table->foreign('talent_id')->references('id')->on('talents');
        });

        //Constraint for offer
        Schema::table('offer_letter_jobs_details', function($table) {
            $table->foreign('offer_letters_id')->references('id')->on('offer_letters');
        });

        //Constraint for activity
        Schema::table('activity', function($table) {
            $table->foreign('activity_type_id')->references('id_params')->on('global_params');
        });

        //Constraint for talents
        Schema::table('talent_details', function($table) {
            $table->foreign('id_talent')->references('id')->on('talents');
        });
        Schema::table('talent_details', function($table) {
            $table->foreign('id_talent_details')->references('id')->on('talent_detail_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
