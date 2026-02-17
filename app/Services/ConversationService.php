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

    public function getConversation($userid , $activeFriendeid)
    {
        $conversation = $this -> conversationRepository ->findPrivateBetween($userid , $activeFriendeid) ; 

        if (!$conversation) {
            $conversation = $this -> conversationRepository -> store() ;

            $conversation->users()->attach([$userid, $activeFriendeid]);

        }

        return $conversation ; 
    }

}
