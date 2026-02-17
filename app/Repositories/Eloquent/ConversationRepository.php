<?php

namespace App\Repositories\Eloquent;

use App\Models\Conversation;

class ConversationRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function store()
    {
        return Conversation::create() ;
    }


    public function findPrivateBetween($id1, $id2)
    {
        return Conversation::whereHas('users', function ($q) use ($id1) {
            $q->where('user_id', $id1);
        })->whereHas('users', function ($q) use ($id2) {
            $q->where('user_id', $id2);
        })->first();

    }

}
