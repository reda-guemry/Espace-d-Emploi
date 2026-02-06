<?php

namespace App\Http\Controllers;

use App\Models\Connection;
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

        return redirect() -> back(); 

    }

    public function accept(Connection $connection) {
        // dd($connection) ;
        $this -> connectionService -> accept($connection) ;

        return redirect() -> back() ;
    }

    public function refuse (Connection $connection)
    {
        $this -> connectionService -> refuse($connection) ;

        return redirect() -> back() ;
    }


}
