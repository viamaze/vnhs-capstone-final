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
        Schema::create('gradeitems', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subject_id')->nullable()->constrained()->onUpdate('cascade')
            ->onDelete('cascade');
            $table->decimal('first_grading');
            $table->decimal('second_grading');
            $table->decimal('third_grading');
            $table->decimal('fourth_grading');
            $table->decimal('final_grade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gradeitems');
    }
};
