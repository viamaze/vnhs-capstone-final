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

        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_year_id')->nullable()->constrained()->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('student_id')->nullable()->constrained()->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('level_id')->nullable()->constrained()->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('specialization_id')->nullable()->constrained()->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('section_id')->nullable()->constrained()->onUpdate('cascade')
            ->onDelete('cascade');
            $table->timestamps();
      
        });

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollments');
    }
};
