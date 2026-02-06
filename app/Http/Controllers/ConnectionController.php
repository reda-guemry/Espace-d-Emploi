<?php

namespace App\Http\Controllers;

use App\Services\ConnectionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ConnectionController extends Controller
{
    public function __construct(
        public ConnectionService $connectionService
    ){}
    
    public function store($id) 
    {
        $sender_id = Auth::id() ; 
        $receiver_id = $id ; 

        $this -> connectionService -> store ($sender_id , $receiver_id) ;

        return redirect() -> back() -> with('succes' , 'Connection create') ; 

    }
}
