<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function booted(): void
    {
        if (auth()->check()) {
            static::addGlobalScope('team', function (Builder $query) {
                $query->where('teacher_id', auth()->user()->id);
            });
        }
    }

    public function classrooms()
    {
        return $this->belongsToMany(Classroom::class, 'classroom_has_students');
    }

}
