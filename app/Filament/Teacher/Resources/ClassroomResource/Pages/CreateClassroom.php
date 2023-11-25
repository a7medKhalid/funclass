<?php

namespace App\Filament\Teacher\Resources\ClassroomResource\Pages;

use App\Filament\Teacher\Resources\ClassroomResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateClassroom extends CreateRecord
{
    protected static string $resource = ClassroomResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['teacher_id'] = auth()->user()->id;
        return $data;
    }
}
