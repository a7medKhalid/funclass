<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected function points(): Attribute
    {
        return Attribute::make(
            fn() => $this->students->sum('points')
        );
    }
    protected function level(): Attribute {
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

    public function getLevelProgressAttribute(): float
    {
        $studentsCount = $this->students->count();

        if ($studentsCount === 0) {
            return 0;
        }

        return (($this->points % ((10 * $studentsCount) / 2)) / ((10 * $studentsCount) / 2)) * 100 + 10;
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'group_has_students');
    }
}
