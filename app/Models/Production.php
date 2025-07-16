<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'type',
        'audio_sample_path',
        'youtube_link',
        'price',
        'cover_image',
        'file_path',
        'is_visible',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_visible' => 'boolean',
    ];
}
