<?php

namespace App\Services;

use App\Repositories\Eloquent\ConversationRepository;
use App\Repositories\Eloquent\MessageRepository;

class MessageService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        private MessageRepository $messageRepository,
        private ConversationService $conversationService,
    ) {
    }


    public function send($sender, $receiverId, $content = null, $attachment = null)
    {
        $conversation = $this->conversationService->getConversation($sender, $receiverId);

        $payload = [
            'conversation_id' => $conversation->id,
            'sender_id' => $sender,
            'content' => $content,
            'type' => 'text',
            'attachment' => null,
        ];

        if ($attachment) {
            $path = $attachment->store('attachments', 'public');

            $payload['attachment'] = basename($path);


            $mime = $attachment->getMimeType();

            if (str_starts_with($mime, 'image/')) {
                $payload['type'] = 'image';
            } else if (str_starts_with($mime, 'video/')) {
                $payload['type'] = 'video';
            } else {
                $payload['type'] = 'file';
            }
            // dd($payload);
        }

        return $this->messageRepository->store($payload);
    }

}
