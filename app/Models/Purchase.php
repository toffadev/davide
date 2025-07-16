<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'production_id',
        'stripe_session_id',
        'stripe_payment_intent_id',
        'amount_paid',
        'email',
        'status',
        'download_expires_at',
    ];

    protected $casts = [
        'amount_paid' => 'decimal:2',
        'download_expires_at' => 'datetime',
    ];

    /**
     * Relation avec l'utilisateur
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relation avec la production
     */
    public function production()
    {
        return $this->belongsTo(Production::class);
    }
}
