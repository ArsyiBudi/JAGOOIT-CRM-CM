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
            $table->string('letter_numbers');
            $table->integer('leads_id');
            $table->string('employee_name');
            $table->string('employee_position');
            $table->string('employee_address');
            $table->string('client_name');
            $table->string('client_position');
            $table->string('client_address');
            $table->date('start_date');
            $table->date('end_date');
            $table->double('nominal_fees');
            $table->text('included_fees');
            $table->double('weekday_cost');
            $table->double('weekend_cost');
            $table->text('notes');
            $table->double('consumption_cost');
            $table->double('transportation_cost');
            $table->date('billing_due_date');
            $table->integer('billing_days');
            $table->string('authorized_by');
            $table->integer('account_number');
            $table->string('bank_name');
            $table->string('account_manager_provider')->default("Sdr. Septian Nugraha Kudrat");
            $table->string('provider_finance_administrator')->default("Sdri. Retno Aliifah");
            $table->string('jagoit_director');
            $table->string('client_director');
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
