<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GradeItems extends Model
{
    use HasFactory;

    public function grade(): BelongsTo
    {
        return $this->BelongsTo(Grade::class);
    }
}
