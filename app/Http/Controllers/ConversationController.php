<?php

namespace App\Http\Controllers;

use App\Services\ConversationService;
use Illuminate\Http\Request;

class ConversationController extends Controller
{

    public function __construct(
        private ConversationService $conversationService
    ){}

    public function index()
    {
        

    }

}
