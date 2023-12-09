<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Teacher extends Model
{
    use HasFactory;

    public function province(): BelongsTo
    {
        return $this->BelongsTo(Province::class);
    }

    public function municipality(): BelongsTo
    {
        return $this->BelongsTo(Municipality::class);
    }

    public function barangay(): BelongsTo
    {
        return $this->BelongsTo(Barangay::class);
    }

    public function level(): BelongsTo
    {
        return $this->BelongsTo(Level::class);
    }

    public function advisory(): BelongsTo
    {
        return $this->BelongsTo(Advisory::class);
    }

    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }
}
