<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Grade extends Model
{
    use HasFactory;

    public function student(): BelongsTo
    {
        return $this->BelongsTo(Student::class);
    }

    public function subject(): BelongsTo
    {
        return $this->BelongsTo(Subject::class);
    }

}
