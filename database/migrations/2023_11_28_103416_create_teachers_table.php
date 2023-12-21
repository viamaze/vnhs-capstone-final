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

        Schema::create('teachers', function (Blueprint $table) {
            $table->id('id');
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('middle_initial')->nullable();
            $table->string('suffix')->nullable();
            $table->string('gender')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->string('civil_status')->nullable();
            $table->string('nationality')->nullable();
            $table->string('religion')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('address')->nullable();
            $table->foreignId('barangay_id')->nullable()->nullOnDelete()->constrained();
            $table->foreignId('municipality_id')->nullable()->nullOnDelete()->constrained();
            $table->foreignId('province_id')->nullable()->nullOnDelete()->constrained();
            $table->string('emergency_contactperson')->nullable();
            $table->string('emergency_address')->nullable();
            $table->string('emergency_mobile')->nullable();
            $table->string('full_name')->virtualAs('concat(first_name, \' \', middle_name , \' \', last_name)');
            $table->string('remarks')->nullable();
            $table->foreignId('user_id')->nullable()->nullOnDelete()->constrained();
            $table->foreignId('level_id')->nullable()->nullOnDelete()->constrained();
            $table->foreignId('department_id')->nullable()->nullOnDelete()->constrained();
            $table->timestamps();
        });

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
