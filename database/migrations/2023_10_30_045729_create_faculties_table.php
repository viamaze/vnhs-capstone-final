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
        Schema::create('faculties', function (Blueprint $table) {
            $table->id('faculty_id');
            $table->string('lname')->nullable();
            $table->string('fname')->nullable();
            $table->string('mname')->nullable();
            $table->string('mi')->nullable();
            $table->string('ext')->nullable();
            $table->string('gender')->nullable();
            $table->string('dob')->nullable();
            $table->string('pob')->nullable();
            $table->string('civilstatus')->nullable();
            $table->string('nationality')->nullable();
            $table->string('religion')->nullable();
            $table->string('email')->nullable();
            $table->string('contactno')->nullable();
            $table->string('address')->nullable();
            $table->string('barangay')->nullable();
            $table->string('municipality')->nullable();
            $table->string('province')->nullable();
            $table->string('emergency_contact')->nullable();
            $table->string('emergency_address')->nullable();
            $table->string('emergency_mobile')->nullable();
            $table->string('emergency_tel')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faculties');
    }
};
