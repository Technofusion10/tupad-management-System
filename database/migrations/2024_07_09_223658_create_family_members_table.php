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
        Schema::create('family_members', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('tupad_employees');

            $table->string('Family_Fname');
            $table->string('Family_Mname');
            $table->string('Family_Lname');
            $table->string('Family_gender');
            $table->string('Family_age');
            $table->string('Family_birth');
            $table->string('Family_mobile');
            $table->string('Family_Cstatus');
            $table->string('Family_province');
            $table->string('Family_barangay');
            $table->string('Family_street');
            $table->string('Family_postalcode');
            $table->string('Family_Relationship');
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
        Schema::dropIfExists('family_members');
    }
};
