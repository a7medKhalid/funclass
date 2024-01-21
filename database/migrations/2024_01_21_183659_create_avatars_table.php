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
        Schema::create('avatars', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('eyes')->default(\App\Enums\Avatar\EyesEnum::happy);
            $table->string('mouth')->default(\App\Enums\Avatar\MouthEnum::smile01);
            $table->string('background_type')->default(\App\Enums\Avatar\BackgroundTypeEnum::solid);

            $table->foreignId('student_id')->constrained()->onDelete('cascade');
        });

        //create avatars for existing students
        \App\Models\Student::all()->each(function ($student) {
            $student->avatar()->create();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avatars');
    }
};
