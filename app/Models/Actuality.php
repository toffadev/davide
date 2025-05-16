<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actuality extends Model
{
    protected $fillable = [
        'title',
        'content',
        'image',
        'date',
        'is_featured',
        'category',
        'is_visible'
    ];

    protected $casts = [
        'date' => 'date',
        'is_featured' => 'boolean',
        'is_visible' => 'boolean'
    ];
} 