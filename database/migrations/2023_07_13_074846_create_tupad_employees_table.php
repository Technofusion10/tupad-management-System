<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tupad_employees', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('tupad_id');
            $table->foreign('tupad_id')->references('id')->on('tupad_information');

            $table->string('first_name');
            $table->string('middle_initial')->nullable();
            $table->string('last_name');
            $table->string('name_extension')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('email_address')->nullable();
            $table->string('date_of_birth');
            $table->string('age');
            $table->string('gender');
            $table->string('civil_status');
            $table->string('region');
            $table->string('province');
            $table->string('barangay');
            $table->string('postal_code');
            $table->string('street');
            $table->string('designated_beneficiary')->nullable();
            $table->string('relationship_to_assured')->nullable();
            $table->date('period_of_employment_start')->nullable();
            $table->date('period_of_employment_end')->nullable();
            $table->bigInteger('total_insurance_amount');

            $table->date('reviewed_by_IMSD')->nullable();
            $table->date('reviewed_by_TSSD')->nullable();
            $table->date('reviewed_by_ORD')->nullable();
            $table->date('reviewed_by_COA')->nullable();
            $table->date('reviewed_by_CASHIER')->nullable();
            $table->date('reviewed_by_BUDGET')->nullable();
            $table->date('reviewed_by_ACCOUNTING')->nullable();
            $table->date('reviewed_by_ARD')->nullable();
            $table->date('reviewed_by_RD')->nullable();
            $table->date('reviewed_by_PD')->nullable();

            $table->string('beneficiary_type')->nullable();
            $table->string('beneficiary_status')->nullable();

            $table->string('file_name', 255)->nullable();
            $table->string('file_path', 355)->nullable();
            $table->string('file_capture', 355)->nullable();

            $table->string('status')->nullable();
            $table->string('remarks')->nullable();
            $table->string('interviewed_by')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tupad_employees');
    }
};
