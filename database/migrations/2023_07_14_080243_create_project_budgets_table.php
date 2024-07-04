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
        Schema::create('project_budgets', function (Blueprint $table) {
            $table->id();
            $table->string('program')->nullable();
            $table->string('program_type')->nullable();
            $table->string('program_status')->nullable();
            $table->string('project_priority')->nullable();
            $table->date('period_of_project_start')->nullable();
            $table->date('period_of_project_end')->nullable();
            $table->string('project_total_budget');
            $table->string('description')->nullable();
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
        Schema::dropIfExists('project_budgets');
    }
};
