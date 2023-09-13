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
        Schema::create('popks_letter', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('letter_numbers') -> nullable();
            $table->integer('leads_id') -> nullable();
            $table->string('employee_name') -> nullable();
            $table->string('employee_position') -> nullable();
            $table->string('employee_address') -> nullable();
            $table->string('client_name') -> nullable();
            $table->string('client_position') -> nullable();
            $table->string('client_address') -> nullable();
            $table->date('start_date') -> nullable();
            $table->date('end_date') -> nullable();
            $table->double('nominal_fees') -> nullable();
            $table->text('included_fees') -> nullable();
            $table->double('weekday_cost') -> nullable();
            $table->double('weekend_cost') -> nullable();
            $table->text('notes') -> nullable();
            $table->double('consumption_cost') -> nullable();
            $table->double('transportation_cost') -> nullable();
            $table->integer('billing_due_date') -> nullable();
            $table->integer('billing_days') -> nullable();
            $table->string('authorized_by') -> nullable();
            $table->bigInteger('account_number') -> nullable();
            $table->string('bank_name') -> nullable();
            $table->string('account_manager_provider')->default("Sdr. Septian Nugraha Kudrat");
            $table->string('provider_finance_administrator')->default("Sdri. Retno Aliifah");
            $table->string('jagoit_director') -> nullable();
            $table->string('client_director') -> nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('popks_letter');
    }
};
