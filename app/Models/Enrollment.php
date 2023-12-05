<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Enrollment extends Model
{
    use HasFactory;

    public function level(): BelongsTo
    {
        return $this->BelongsTo(Level::class);
    }

    public function student(): BelongsTo
    {
        return $this->BelongsTo(Student::class);
    }

    public function specialization(): BelongsTo
    {
        return $this->BelongsTo(Specialization::class);
    }

    public function section(): BelongsTo
    {
        return $this->BelongsTo(Section::class);
    }
}
