<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subject extends Model
{
    use HasFactory;

    public function teacher(): BelongsTo
    {
        return $this->BelongsTo(Teacher::class);
    }

    public function level(): BelongsTo
    {
        return $this->BelongsTo(Level::class);
    }

    public function grade(): BelongsTo
    {
        return $this->BelongsTo(Grade::class);
    }
}
