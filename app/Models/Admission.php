<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Admission extends Model
{
    use HasFactory;

    public function student(): BelongsTo
    {
        return $this->BelongsTo(Student::class);
    }

    public function level(): BelongsTo
    {
        return $this->BelongsTo(Level::class);
    }

    public function specialization(): BelongsTo
    {
        return $this->BelongsTo(Specialization::class);
    }

    public function school_year(): BelongsTo
    {
        return $this->BelongsTo(SchoolYear::class);
    }

    public function schedule(): BelongsTo
    {
        return $this->BelongsTo(Schedule::class);
    }
}
