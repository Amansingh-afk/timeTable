<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    protected $fillable = [
        'name',
        'emali',
        'courses',
        'unavailable_periods',
    ];

    protected $casts = [
        'courses' => 'array',
        'unavailable_periods' => 'array',
    ];
}
