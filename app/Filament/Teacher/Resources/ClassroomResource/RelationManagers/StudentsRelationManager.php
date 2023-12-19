<?php

namespace App\Filament\Teacher\Resources\ClassroomResource\RelationManagers;

use App\Models\Group;
use App\Models\Student;
use Filament\Actions\CreateAction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\HtmlString;

class StudentsRelationManager extends RelationManager
{
    protected static string $relationship = 'students';

    public static function getModelLabel(): string
    {
        return __('teacher.Student');
    }

    public static function getPluralModelLabel(): ?string
    {
        return __('teacher.Students');
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label(__('teacher.Name'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('group_id')
                ->relationship( 'groups', 'name', fn($query) => $query->where('classroom_id', $this->getOwnerRecord()->id))
                ->createOptionForm([
                            Forms\Components\TextInput::make('name')
                                ->label(__('teacher.Name'))
                                ->required()
                                ->maxLength(255),
                    ]
                )->createOptionUsing(function (array $data) {
                    $data['classroom_id'] = $this->getOwnerRecord()->id;

                    return Group::create([
                        'name' => $data['name'],
                        'classroom_id' => $data['classroom_id'],
                    ]);

                }),

            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('teacher.Name'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('points')
                    ->label(__('teacher.Points'))
                    ->sortable(),
                Tables\Columns\TextColumn::make('level')
                    ->label(__('teacher.Level'))
                    ->sortable(),
                Tables\Columns\TextColumn::make('level')
                    ->formatStateUsing(fn($state, $record) => $record->groups->where('classroom_id', $this->getOwnerRecord()->id)->first()->name ?? '')
                    ->label(__('teacher.Group')),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()->using(function ($data) {
                    $data['teacher_id'] = auth()->user()->id;

                    $student = Student::create([
                        'name' => $data['name'],
                        'teacher_id' => $data['teacher_id'],
                    ]);

                    $student->groups()->attach($data['group_id']);

                    $student->classRooms()->attach($this->getOwnerRecord()->id);
                    $student->save();

                    return $student;

                }),
                Tables\Actions\AttachAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make()->using(
                    function ($data, $record) {
                        $record->name = $data['name'];

                        $record->groups()->detach();
                        $record->groups()->attach($data['group_id']);

                        $record->save();
                    }
                ),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\DetachAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }



}
