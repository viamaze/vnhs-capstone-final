<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ScheduleItems extends Model
{
    use HasFactory;

    protected $casts = [
        'day' => 'array',
        'start_time' => 'array',
        'end_time' => 'array',
    ];

    public function subject(): BelongsTo
    {
        return $this->BelongsTo(Subject::class);
    }
}
