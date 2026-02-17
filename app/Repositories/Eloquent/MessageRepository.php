<?php

namespace App\Repositories\Eloquent;

use App\Models\Message;

class MessageRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }


    public function store($data) 
    {
        return Message::create($data) ;
    }


}
