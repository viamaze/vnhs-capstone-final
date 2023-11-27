<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Section extends Model
{
    use HasFactory;

    public function level(): BelongsTo
    {
        return $this->BelongsTo(Level::class);
    }

    public function specialization(): BelongsTo
    {
        return $this->BelongsTo(Specialization::class);
    }

    public function room(): BelongsTo
    {
        return $this->BelongsTo(Room::class);
    }

    public function faculty(): BelongsTo
    {
        return $this->BelongsTo(Faculty::class);
    }

    public function sectionItems(): HasMany
    {
        return $this->hasMany(related: SectionItem::class);
    }


}
