<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaGallery extends Model
{
    protected $table = 'media_gallery';

    protected $fillable = [
        'title',
        'description',
        'type',
        'url',
        'thumbnail',
        'category',
        'is_visible',
        'order'
    ];

    protected $casts = [
        'is_visible' => 'boolean',
        'order' => 'integer'
    ];
} 