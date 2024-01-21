<?php

namespace App\Models;

use App\Enums\Avatar\BackgroundTypeEnum;
use App\Enums\Avatar\EyesEnum;
use App\Enums\Avatar\MouthEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'eyes' => EyesEnum::class,
        'mouth' => MouthEnum::class,
        'background_type' => BackgroundTypeEnum::class,
    ];

    public function student(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
