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
        Schema::create('tupad_information', function (Blueprint $table) {
            $table->id();
            $table->string('project_reference')->nullable();
            $table->string('name_of_program');
            $table->string('name_of_office')->nullable();
            $table->string('office_address')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('email_address')->nullable();
            $table->string('province')->nullable();
            $table->string('region')->nullable();
            $table->bigInteger('total_budget');

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

            $table->date('period_of_project_start')->nullable();
            $table->date('period_of_project_end')->nullable();

            $table->date('approved_date')->nullable();
            $table->date('denied_date')->nullable();

            $table->string('description')->nullable();
            $table->string('prepared_by')->nullable();


            $table->string('reason_for_denied')->nullable();

            $table->string('status')->nullable();
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('tupad_information');
    }
};
