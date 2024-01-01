<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;

class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens, HasFactory, Notifiable;

    const ROLE_ADMIN = 'ADMIN';
    const ROLE_FACULTY = 'FACULTY';
    const ROLE_STUDENT = 'STUDENT';

    const ROLES = [
        self::ROLE_ADMIN => 'Admin',
        self::ROLE_FACULTY => 'Faculty',
        self::ROLE_STUDENT => 'Student'
    ];

    public function canAccessPanel(Panel $panel): bool
    {
        //if ($panel->getId() === 'admin' || $panel->getId() === 'students' || $panel->getId() === 'teachers')
            //return $this->isAdmin();

        if ($panel->getId() === 'students')
            return $this->isStudent();
        
        if ($panel->getId() === 'teachers')
            return $this->isFaculty();
        
        return true;
    }

    public function isAdmin()
    {
        return $this->role === self::ROLE_ADMIN;
    }

    public function isStudent()
    {
        return $this->role === self::ROLE_STUDENT;
    }

    public function isTeacher()
    {
        return $this->role === self::ROLE_FACULTY;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

}
