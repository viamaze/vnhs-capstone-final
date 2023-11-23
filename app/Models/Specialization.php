<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Specialization extends Model
{
    use HasFactory;

    public function level(): BelongsTo
    {
        return $this->BelongsTo(Level::class);
    }

    public function specializationItems(): HasMany
    {
        return $this->hasMany(related: SpecializationItem::class);
    }
}
