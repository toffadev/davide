<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'address',
        'city',
        'country',
        'event_date',
        'ticket_link',
        'url_youtube',
        'is_sold_out',
        'is_visible'
    ];

    protected $casts = [
        'event_date' => 'datetime',
        'is_sold_out' => 'boolean',
        'is_visible' => 'boolean'
    ];
}
