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

        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('level_id')->nullable()->nullOnDelete()->constrained();
            $table->foreignId('specialization_id')->nullable()->nullOnDelete()->constrained();
            $table->foreignId('section_id')->nullable()->nullOnDelete()->constrained();
            $table->timestamps();    
        });

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
