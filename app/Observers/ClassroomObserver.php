<?php

namespace App\Observers;

use App\Models\Classroom;

class ClassroomObserver
{
    public function cre(Classroom $classroom): void
    {
        if (auth()->check()) {
            auth()->user()->classrooms()->save($classroom);
        }
    }
}
