<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SectionItem extends Model
{
    use HasFactory;

    protected $casts = [
        'day' => 'array',
    ];

    public function subject(): BelongsTo
    {
        return $this->BelongsTo(Subject::class);
    }

    public function level(): BelongsTo
    {
        return $this->BelongsTo(Level::class);
    }
}
