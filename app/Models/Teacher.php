<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

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

    protected $casts = [
        'days' => 'array',
        'periods' => 'array',
    ];

    // Relationship with schedules
    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}