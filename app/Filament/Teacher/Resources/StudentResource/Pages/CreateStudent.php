<?php

namespace App\Filament\Teacher\Resources\StudentResource\Pages;

use App\Filament\Teacher\Resources\StudentResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateStudent extends CreateRecord
{
    protected static string $resource = StudentResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['teacher_id'] = auth()->user()->id;

        return $data;
    }

}
