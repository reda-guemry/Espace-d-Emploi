<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessageRuquest;
use App\Services\MessageService;
use Illuminate\Http\Request;

class MessageController extends Controller
{

    public function __construct(
        private MessageService $messageService
    ) {
    }

    public function store(StoreMessageRuquest $request)
    {
        $data = $request->validates();

        $this->messageService->send(
            auth()->user(),
            $data['receiver_id'],
            $data['content'] ?? null,
            $data['attachment'] ?? null
        );


    }
}
