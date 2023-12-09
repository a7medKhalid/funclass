<?php

namespace App\Filament\Teacher\Resources\ClassroomResource\Pages;

use App\Filament\Teacher\Resources\ClassroomResource;
use App\Models\Classroom;
use App\Models\Student;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewClassroom extends ViewRecord
{
    protected static string $resource = ClassroomResource::class;

    protected static string $view = 'filament.teacher.pages.classroom';

    public Classroom $classroom;

    public $students;

    public $modalModel = null;

    public function increasePoints($studentId)
    {
        $student = Student::find($studentId);
        $old_level = $student->level;

        $student->points += 1;
        $student->save();

        $student = $student->fresh();
        $new_level = $student->level;

        if ($new_level > $old_level) {
            $this->modalModel = $student;
            $this->dispatch('open-modal', id: 'student-level-up');

            $this->dispatchFormEvent('confetti');
        }

//        dd($student, $old_level, $new_level);


        $old_level = $this->classroom->level;
        $this->classroom->points += 1;
        $this->classroom->save();

        $new_level = $this->classroom->level;

        if ($new_level > $old_level) {
            $this->modalModel = $this->classroom;
            $this->dispatch('open-modal', id: 'classroom-level-up');
        }

    }

    public function decreasePoints($studentId)
    {
        $student = Student::find($studentId);

        if ($student->points != 0) {


            $student->points -= 1;
            $student->save();

            $this->classroom->points -= 1;
            $this->classroom->save();
        }

    }

    public function mount(Classroom|string|int $record): void
    {
        $this->classroom = Classroom::find($record);

        $this->students = $this->classroom->students()->get();

        parent::mount($record);
    }

    public function triggerConfetti()
    {
        $this->dispatchFormEvent('confetti');
    }
}
