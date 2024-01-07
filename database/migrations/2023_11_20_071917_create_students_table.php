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
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->boolean('active_student')->nullable();
            $table->string('student_id')->nullable();
            $table->string('student_status')->nullable();
            $table->string('enrollment_status')->nullable();
            $table->foreignId('level_id')->nullable()->constrained()->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('lastname')->nullable();
            $table->string('firstname')->nullable();
            $table->string('middlename')->nullable();
            $table->string('mi')->nullable();
            $table->string('suffix')->nullable();
            $table->string('gender')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->string('civil_status')->nullable();
            $table->string('nationality')->nullable();
            $table->string('religion')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('bloodtype')->nullable();
            $table->string('ethnicity')->nullable();
            $table->string('address')->nullable();
            $table->foreignId('barangay_id')->nullable()->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('municipality_id')->nullable()->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('province_id')->nullable()->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('zipcode')->nullable();
            $table->string('father_last_name')->nullable();
            $table->string('father_first_name')->nullable();
            $table->string('father_middle_name')->nullable();
            $table->date('father_dob')->nullable();
            $table->string('father_occupation')->nullable();
            $table->string('father_monthlyincome')->nullable();
            $table->string('father_yearlycomp')->nullable();
            $table->string('father_contactno')->nullable();
            $table->string('father_educational')->nullable();
            $table->string('father_address')->nullable();
            $table->string('mother_last_name')->nullable();
            $table->string('mother_first_name')->nullable();
            $table->string('mother_middle_name')->nullable();
            $table->date('mother_dob')->nullable();
            $table->string('mother_occupation')->nullable();
            $table->string('mother_monthlyincome')->nullable();
            $table->string('mother_yearlycomp')->nullable();
            $table->string('mother_contactno')->nullable();
            $table->string('mother_educational')->nullable();
            $table->string('mother_address')->nullable();
            $table->string('emergency_contact_person')->nullable();
            $table->string('emergency_address')->nullable();
            $table->string('emergency_mobile')->nullable();
            $table->string('full_name')->virtualAs('concat(firstname, \' \', middlename , \' \', lastname)');
            $table->timestamps();
        });

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
