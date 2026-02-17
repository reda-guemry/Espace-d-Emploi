<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessageRequest;
use App\Services\MessageService;
use Auth;
use Illuminate\Http\Request;

class MessageController extends Controller
{

    public function __construct(
        private MessageService $messageService
    ) {
    }

    public function store(StoreMessageRequest $request)
    {
        $data = $request->validated();
        // dd('s');

        $this->messageService->send(
            Auth::id(),
            $data['receiver_id'],
            $data['content'] ?? null,
            $data['attachment'] ?? null
        );

        return back() ;

    }
}
