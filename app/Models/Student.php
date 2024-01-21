<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'group_has_students');
    }

    public function points(): HasMany
    {
        return $this->hasMany(Point::class);
    }

    public function avatar(): HasOne
    {
        return $this->hasOne(Avatar::class);
    }

    //get level attribute
    protected function level(): Attribute
    {
        return Attribute::make(
            fn() =>  floor($this->points / 10) + 1
        );
    }

    //get level progress attribute
    protected function levelProgress(): Attribute
    {
        return Attribute::make(
            fn() => (($this->points % 10) / 10) * 100 + 10
        );

    }

    public static function created($callback)
    {
        //create avatar
        static::created(function ($student) {
            $student->avatar()->create();
        });
    }

}
