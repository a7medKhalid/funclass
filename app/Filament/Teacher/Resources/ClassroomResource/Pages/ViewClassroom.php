<?php

namespace App\Filament\Teacher\Resources\ClassroomResource\Pages;

use App\Filament\Teacher\Resources\ClassroomResource;
use App\Models\Classroom;
use App\Models\Student;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Support\Collection;

class ViewClassroom extends ViewRecord
{
    protected static string $resource = ClassroomResource::class;

    protected static string $view = 'filament.teacher.pages.classroom';

    public Classroom $classroom;

    public Collection $students;

    public Collection $groups;

    public $modalModel = null;

    public function increasePoints($studentId)
    {
        $student = Student::find($studentId);
        $old_level = $student->level;

        $group = $student->groups()->where('classroom_id', $this->classroom->id)->first();
        $old_group_level = $group->level ?? 0;



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

        //check if group level up

        if ($group) {
            $group->refresh();
            $new_level = $group->level;

            if ($new_level > $old_group_level) {
                $this->modalModel = $group;
                $this->dispatch('open-modal', id: 'group-level-up');
            }
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

        if ($this->classroom->groups()->count() > 0) {
            $this->groups = $this->classroom->groups()->with('students')->get();
            $this->students = collect();
        } else {
            $this->students = $this->classroom->students()->get();
            $this->groups = collect();
        }

        parent::mount($record);
    }

    public function triggerConfetti()
    {
        $this->dispatchFormEvent('confetti');
    }
}
