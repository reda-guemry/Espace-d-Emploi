<?php

namespace App\Http\Controllers;

use App\Services\ConversationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use View;

class ConversationController extends Controller
{

    public function __construct(
        private ConversationService $conversationService
    ){}

    public function index()
    {
    
        $friends = Auth::user()->friends() -> get() ;

        // dd($friends) ;
    
        return View('conversation.convertation' , compact('friends')) ;
    }

}
