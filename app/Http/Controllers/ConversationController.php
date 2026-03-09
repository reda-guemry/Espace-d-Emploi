<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use App\Services\ConversationService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use View;

class ConversationController extends Controller
{

    public function __construct(
        private ConversationService $conversationService , 
        private UserService $userService    
    ){}

    public function conversation($id = null)
    {
        $user = Auth::user() ; 
    
        $friends = Auth::user()->friends() -> get() ;

        $messages = [] ;
        $activeFriend = null ;
        $conversation = null ;

        if($id){
            $activeFriend = $this ->userService ->getUserById($id) ;
            
            $conversation = $this -> conversationService -> getConversation($user->id , $activeFriend->id) ;

            $messages = $conversation->messages()->with('sender')->orderBy('created_at')->get() ; 
        }
    
        return view('conversation.convertation' , compact('friends' , 'messages' , 'conversation' , 'activeFriend')) ;
    }
}
