<?php

namespace App\Filament\Teacher\Resources;

use App\Filament\Teacher\Resources\ClassroomResource\Pages;
use App\Filament\Teacher\Resources\ClassroomResource\RelationManagers;
use App\Models\Classroom;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Teacher\Pages\Classroom as ClassroomPage;
class ClassroomResource extends Resource
{
    protected static ?string $model = Classroom::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


    public static function getLabel(): ?string
    {
        return __('teacher.Classrooms');
    }

    public static function getPluralLabel(): ?string
    {
        return __('teacher.Classrooms');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label(__('Name'))
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('teacher.Name'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('points')
                    ->label(__('teacher.Points'))
                    ->sortable(),
                Tables\Columns\TextColumn::make('studentsCount')
                    ->label(__('teacher.Students'))
                    ->sortable(),
                Tables\Columns\TextColumn::make('level')
                    ->label(__('teacher.Level'))
                    ->sortable(),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make()
//                Tables\Actions\Action::make('start')
//                ->label(__('Start'))
//                ->icon('heroicon-o-play')
//                ->url(fn (Classroom $classroom) => ClassroomPage::getUrl(['classroom' => $classroom])),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\StudentsRelationManager::make()
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListClassrooms::route('/'),
            'create' => Pages\CreateClassroom::route('/create'),
            'edit' => Pages\EditClassroom::route('/{record}/edit'),
            'view' => Pages\ViewClassroom::route('/{record}'),
        ];
    }
}
