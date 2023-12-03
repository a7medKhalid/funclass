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

    public function increasePoints($studentId)
    {
        $student = Student::find($studentId);
        $student->points += 1;
        $student->save();

        $this->classroom->points += 1;
        $this->classroom->save();
    }

    public function decreasePoints($studentId)
    {
        $student = Student::find($studentId);
        $student->points -= 1;
        $student->save();

        $this->classroom->points -= 1;
        $this->classroom->save();

    }

    public function mount(Classroom|string|int $record): void
    {
        $this->classroom = Classroom::find($record);

        $this->students = $this->classroom->students()->get();

        parent::mount($record);
    }
}
