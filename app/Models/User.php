<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    const TYPE_HOD = 1;
    const TYPE_STAFF = 2;
    const TYPE_STUDENT = 3;

    protected $fillable = [
        'name',
        'email',
        'password',
        'user_type',
    ];

    public function isHod()
    {
        return $this->user_type === self::TYPE_HOD;
    }

    public function isStaff()
    {
        return $this->user_type === self::TYPE_STAFF;
    }

    public function isStudent()
    {
        return $this->user_type === self::TYPE_STUDENT;
    }

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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
