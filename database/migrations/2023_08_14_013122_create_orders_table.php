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
        Schema::create('orders', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->integer('leads_id');
            $table->integer('appoinment_activity_id')->nullable();
            $table->integer('offer_letter_id')->nullable();
            $table->integer('popks_letter_id')->nullable();
            $table->integer('order_status')->default(1);
            $table->string('desired_position');
            $table->bigInteger('needed_qty');
            $table->date('due_date');
            $table->text('description');
            $table->text('characteristic_desc');
            $table->text('skills_desc');
            $table->double('budget_estimation');
            $table->timestamp('start_recruitment') -> nullable();
            $table->timestamp('end_recruitment') -> nullable();
            $table->timestamp('start_training')  -> nullable();
            $table->timestamp('end_training')  -> nullable();
            $table->timestamp('start_offer')  -> nullable();
            $table->timestamp('end_offer')  -> nullable();
            $table->timestamp('start_appointment')  -> nullable();
            $table->timestamp('end_appointment')  -> nullable();
            $table->timestamp('start_probation')  -> nullable();
            $table->timestamp('end_probation') -> nullable();
            $table->timestamp('start_popks')  -> nullable();
            $table->timestamp('end_popks')  -> nullable();
            $table->string('tor_file') ->nullable();
            $table->string('cv_file') ->nullable();
            $table->string('cv_description') ->nullable();
            $table->string('po_file') ->nullable();
            $table->string('po_description') ->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
