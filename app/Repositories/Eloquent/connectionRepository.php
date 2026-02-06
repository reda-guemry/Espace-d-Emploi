<?php

namespace App\Repositories\Eloquent;

use App\Models\Connection ; 


class connectionRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }


    public function store($sender_id, $receiver_id)
    {
        return Connection::create([
            'sender_id' => $sender_id , 
            'receiver_id' => $receiver_id , 
            'status' => 'pending' , 
        ]) ; 
    }

    public function accept(Connection $connection) {
        return $connection-> update([
            'status' => 'accepted'
        ]); 
    }

    public function refuse(Connection $connection) 
    {
        return $connection -> update([
            'status' => 'rejected'
        ]) ; 
    }

    public function checkUserConnect($sender_id, $receiver_id)
    {
        return Connection::where(function($query) use ($sender_id , $receiver_id) {
            $query -> where('sender_id' , $sender_id) 
                ->where('receiver_id' , $receiver_id) ;  
        }) 
        ->orWhere(function($query) use ($sender_id, $receiver_id){
            $query -> where('sender_id' , $receiver_id) 
                ->where('receiver_id' , $sender_id) ;
        })
        -> exists() ;

    }




}
