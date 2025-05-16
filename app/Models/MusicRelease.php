<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MusicRelease extends Model
{
    protected $fillable = [
        'title',
        'description',
        'cover_image',
        'release_date',
        'type',
        'spotify_link',
        'apple_music_link',
        'youtube_link',
        'is_visible'
    ];

    protected $casts = [
        'release_date' => 'date',
        'is_visible' => 'boolean'
    ];
} 