<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
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
}
