<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    use HasFactory;
    
    protected $casts = [
        'active_student' => 'boolean',
    ];

    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function level(): BelongsTo
    {
        return $this->BelongsTo(Level::class);
    }

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


}
