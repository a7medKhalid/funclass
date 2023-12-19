<?php

namespace App\Filament\Teacher\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StudentsCount extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make(__('teacher.Students'), \App\Models\Student::count()),
            Stat::make(__('teacher.Classrooms'), \App\Models\Classroom::count()),
            Stat::make(__('teacher.Groups'), \App\Models\Group::count()),
        ];
    }
}
