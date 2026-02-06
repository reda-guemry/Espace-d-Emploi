<?php

namespace App\Services;

use App\Repositories\Eloquent\connectionRepository;

class ConnectionService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        private connectionRepository $connectionRepository,

    ) {
        //
    }


    public function store($sender_id, $receiver_id)
    {
        if ($sender_id === $receiver_id) {
            return;
        }

        $check = $this->connectionRepository->checkUserConnect($sender_id, $receiver_id);

        if ($check) {
            return;
            }
            
            // dd('skowjsiowj');

        return $this->connectionRepository->store($sender_id, $receiver_id);
    }


}
