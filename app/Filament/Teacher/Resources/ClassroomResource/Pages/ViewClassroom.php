<?php

namespace App\Filament\Teacher\Resources\ClassroomResource\Pages;

use App\Enums\Avatar\BackgroundTypeEnum;
use App\Enums\Avatar\EyesEnum;
use App\Enums\Avatar\MouthEnum;
use App\Filament\Teacher\Resources\ClassroomResource;
use App\Models\Classroom;
use App\Models\Point;
use App\Models\Student;
use Filament\Actions;
use Filament\Actions\Action;
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

    protected function getHeaderActions(): array
    {
        return [
            Action::make('randomStudent')
                ->icon('fontaudio-random-1dice')
                ->iconPosition('after')
                ->label(__('teacher.ChooseRandomStudent'))
                ->action(
                    function (Classroom $record) {
                        $student = $record->students()->inRandomOrder()->first();
                        $this->dispatch('open-modal', id: 'random-student');
                        $this->modalModel = $student;
                    }
                )
        ];
    }

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

        Point::create([
            'student_id' => $student->id,
            'classroom_id' => $this->classroom->id
        ]);

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

    public function getGift(Student $student): void {
        $this->dispatch('open-modal', id: 'get-gift');

        //get random gift
        $giftTypes = [EyesEnum::cases(), MouthEnum::cases(), BackgroundTypeEnum::cases() ];

        $giftTypeRand = rand(0, count($giftTypes) - 1);
        $giftType = $giftTypes[$giftTypeRand];

        $gift = $giftType[rand(0, count($giftType) - 1)];

        $avatar = $student->avatar;

        if ($giftTypeRand == 0) {
            $avatar->eyes = $gift;
        } else if ($giftTypeRand == 1) {
            $avatar->mouth = $gift;
        } else {
            $avatar->background_type = $gift;
        }

        $avatar->save();

        $this->dispatchFormEvent('confetti');

        $this->dispatch('close-modal', id: 'student-level-up');

        //update students state
        $this->getStudents();
    }

    private function getStudents(): void
    {
        $weekKing = $this->classroom->weekKing();

        if ($this->classroom->groups()->count() > 0) {
            $this->groups = $this->classroom->groups()->with('students')->get();
            $this->students = collect();

            //put the week king at the top of the list
            if ($weekKing) {
                foreach ($this->groups as $group) {
                    $isThisGroup = false;
                    $group->students = $group->students->filter(
                        function ($student) use ($weekKing, &$isThisGroup) {
                            if ($student->id === $weekKing->id) {
                                $isThisGroup = true;
                                return false;
                            }
                            return true;
                        }
                    );
                    if ($isThisGroup) {
                        $group->students->prepend($weekKing);
                    }
                }
            }
        } else {
            $this->students = $this->classroom->students()->get();
            $this->groups = collect();

            //put the week king at the top of the list
            if ($weekKing) {
                $this->students = $this->students->filter(fn ($student) => $student->id != $weekKing->id);
                $this->students->prepend($weekKing);
            }
        }
    }

    public function mount(Classroom|string|int $record): void
    {
        $this->classroom = Classroom::find($record);

        $this->getStudents();

        parent::mount($record);
    }

    public function triggerConfetti()
    {
        $this->dispatchFormEvent('confetti');
    }
}
