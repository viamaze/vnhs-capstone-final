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
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('student_id')->nullable();
            $table->string('student_lname')->nullable();
            $table->string('student_fname')->nullable();
            $table->string('student_mname')->nullable();
            $table->string('student_mi')->nullable();
            $table->string('student_ext')->nullable();
            $table->string('student_gender')->nullable();
            $table->date('student_dob')->nullable();
            $table->string('student_pob')->nullable();
            $table->string('student_civilstatus')->nullable();
            $table->string('student_nationality')->nullable();
            $table->string('student_religion')->nullable();
            $table->string('student_email')->nullable();
            $table->string('student_contactnumber')->nullable();
            $table->string('student_height')->nullable();
            $table->string('student_weight')->nullable();
            $table->string('student_bloodtype')->nullable();
            $table->string('student_ethnicity')->nullable();
            $table->string('student_address')->nullable();
            $table->string('student_province')->nullable();
            $table->string('student_municipality')->nullable();
            $table->string('student_barangay')->nullable();
            $table->string('student_zipcode')->nullable();
            $table->string('father_lname')->nullable();
            $table->string('father_fname')->nullable();
            $table->string('father_mname')->nullable();
            $table->string('father_ext')->nullable();
            $table->date('father_dob')->nullable();
            $table->string('father_occupation')->nullable();
            $table->string('father_monthlyincome')->nullable();
            $table->string('father_yearlycomp')->nullable();
            $table->string('father_contactno')->nullable();
            $table->string('father_educational')->nullable();
            $table->string('mother_lname')->nullable();
            $table->string('mother_fname')->nullable();
            $table->string('mother_mname')->nullable();
            $table->string('mother_ext')->nullable();
            $table->date('mother_dob')->nullable();
            $table->string('mother_occupation')->nullable();
            $table->string('mother_monthlyincome')->nullable();
            $table->string('mother_yearlycomp')->nullable();
            $table->string('mother_contactno')->nullable();
            $table->string('mother_educational')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
