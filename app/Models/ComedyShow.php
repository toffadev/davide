<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComedyShow extends Model
{
    protected $fillable = [
        'title',
        'description',
        'cover_image',
        'trailer_url',
        'duration',
        'release_date',
        'is_visible'
    ];

    protected $casts = [
        'duration' => 'integer',
        'release_date' => 'date',
        'is_visible' => 'boolean'
    ];
} 