<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Schedule extends Model
{
    use HasFactory;

    protected $casts = [
        'day' => 'array',
        'start_time' => 'array',
        'end_time' => 'array',
    ];
    
    public function level(): BelongsTo
    {
        return $this->BelongsTo(Level::class);
    }

    public function specialization(): BelongsTo
    {
        return $this->BelongsTo(Specialization::class);
    }

    public function section(): BelongsTo
    {
        return $this->BelongsTo(Section::class);
    }

    public function teacher(): BelongsTo
    {
        return $this->BelongsTo(Teacher::class);
    }

    public function scheduleItems(): HasMany
    {
        return $this->HasMany(scheduleItems::class);
    }

    
}
