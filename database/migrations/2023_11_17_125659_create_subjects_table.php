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
        
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('subject')->nullable();
            $table->string('description')->nullable();
            $table->foreignId('level_id')->nullable()->constrained()->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('teacher_id')->nullable()->constrained()->onUpdate('cascade')
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
        Schema::dropIfExists('subjects');
    }
};
