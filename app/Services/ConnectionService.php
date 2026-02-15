<?php

namespace App\Services;

use App\Models\Connection;
use App\Repositories\Eloquent\connectionRepository;
use Illuminate\Support\Facades\Auth;


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


    public function accept(Connection $connection) {

        if($connection -> receiver_id !== Auth::id()) {
            abort(403) ; 
        }

        return $this -> connectionRepository -> accept($connection) ; 


    }

    public function refuse(Connection $connection) {

        if($connection -> receiver_id !== Auth::id()) {
            abort(403) ; 
        }

        return $this -> connectionRepository -> refuse($connection) ; 



    }


}
