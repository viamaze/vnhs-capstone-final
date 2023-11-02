<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Municipality extends Model
{
    use HasFactory;

    public function province(): BelongsTo
    {
        return $this->BelongsTo(Province::class);
    }

    public function barangay(): HasMany
    {
        return $this->hasMany(Barangay::class);
    }
}
