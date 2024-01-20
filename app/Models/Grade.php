<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Grade extends Model
{
    use HasFactory;

    public function gradeItems(): HasMany
    {
        return $this->HasMany(GradeItems::class);
    }

    public function student(): HasMany
    {
        return $this->HasMany(Student::class);
    }

}
