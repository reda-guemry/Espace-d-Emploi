<?php

namespace App\Services;

use App\Models\Conversation;
use App\Repositories\Eloquent\ConversationRepository;

class ConversationService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        private ConversationRepository $conversationRepository
    ) {
    }

    public function getConversation($user , $activeFriende)
    {
        $conversation = $this -> conversationRepository ->findPrivateBetween($user->id , $activeFriende->id) ; 

        if (!$conversation) {
            $conversation = $this -> conversationRepository -> store() ;

            $conversation->users()->attach([$user->id, $activeFriende->id]);

        }

        return $conversation ; 
    }

}
