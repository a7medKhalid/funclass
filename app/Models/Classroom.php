<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function booted(): void
    {
        if (auth()->check()) {
            static::addGlobalScope('tecaher', function (Builder $query) {
                $query->where('teacher_id', auth()->user()->id);
            });
        }
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'classroom_has_students');
    }

    public function groups()
    {
        return $this->hasMany(Group::class);
    }

    //week king
    public function weekKing()
    {
        $start_date = date('Y-m-d', strtotime('last sunday - 8 days'));
        $end_date = date('Y-m-d', strtotime($start_date . ' + 9 days'));

        $student_id = Point::where('classroom_id', $this->id)
            ->whereBetween('created_at', [$start_date, $end_date])
            ->pluck('student_id')
            ->groupBy(fn ($item) => $item)->sortDesc()->keys()->first();

        return Student::find($student_id);
    }

    //get level attribute
    protected function level(): Attribute
    {
        $studentsCount = $this->students->count();
        if ($studentsCount === 0) {
            return Attribute::make(
                fn() => 1
            );
        }
        return Attribute::make(
            fn() => floor($this->points / ((10 * $studentsCount) / 2)) + 1
        );
    }

    //get level progress attribute
    public function getLevelProgressAttribute(): float
    {
        $studentsCount = $this->students->count();

        if ($studentsCount === 0) {
            return 0;
        }

        return (($this->points % ((10 * $studentsCount) / 2)) / ((10 * $studentsCount) / 2)) * 100 + 10;
    }

    protected function studentsCount(): Attribute
    {
        return Attribute::make(
            fn() => $this->students->count()
        );
    }

}
