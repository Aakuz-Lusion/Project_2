<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Teacher extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'teachers';

    protected $fillable = [
        'name',
        'email',
        'password',
        'subject',
        'grade',
        'priority',
        'days',
        'periods'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'days' => 'array',
        'periods' => 'array',
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Relationship with schedules
    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}