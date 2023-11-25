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
        Schema::create('classroom_has_students', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('student_id')->constrained('students');
            $table->foreignId('classroom_id')->constrained('classrooms');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classroom_has_students');
    }
};
