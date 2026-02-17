<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Connection extends Model
{
    protected $fillable = [
        'sender_id',
        'receiver_id',
        'status',
    ];

    public function sender(): BelongsTo
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function receiver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    
    public function scopeBetween($query, $userA, $userB)
    {
        return $query->where(function ($q) use ($userA, $userB) {
            $q->where('sender_id', $userA)
                ->where('receiver_id', $userB);
        })->orWhere(function ($q) use ($userA, $userB) {
            $q->where('sender_id', $userB)
                ->Where('receiver_id', $userA);
        });

    }

}
