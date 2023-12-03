<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         $teacher = \App\Models\User::factory()
             ->create([
                 'name' => 'Teacher',
                 'email' => 'teacher@mai.com',
                 'password' => bcrypt('password'),
             ]);

            $classroom = \App\Models\Classroom::factory()
                ->create([
                    'teacher_id' => $teacher->id,
                ]);

            $students = \App\Models\Student::factory()
                ->count(35)
                ->create([
                    'teacher_id' => $teacher->id,
                ]);

            foreach ($students as $student) {
                DB::table('classroom_has_students')->insert([
                    'classroom_id' => $classroom->id,
                    'student_id' => $student->id,
                ]);
            }




    }
}
