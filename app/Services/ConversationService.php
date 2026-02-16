<?php

namespace App\Services;

use App\Repositories\Eloquent\ConversationRepository;

class ConversationService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        private ConversationRepository $conversationRepository
    ){}

    

}
