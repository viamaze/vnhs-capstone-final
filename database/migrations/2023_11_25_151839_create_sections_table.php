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

        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('level_id')->nullable()->nullOnDelete()->constrained();
            $table->foreignId('specialization_id')->nullable()->nullOnDelete()->constrained();
            $table->foreignId('teacher_id')->nullable()->nullOnDelete()->constrained();
            $table->foreignId('classroom_id')->nullable()->nullOnDelete()->constrained();
            $table->string('section');
            $table->timestamps(); 
        });

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sections');
    }
};
