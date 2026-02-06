<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CandidateService ; 
use Illuminate\Support\Facades\Auth ; 


class CandidateController extends Controller
{

    public function __construct(
        private CandidateService $candidateService
    ) {}

    public function index(Request $request) {

        $id = Auth::id() ; 

        $filter = $request-> all() ; 

        $candidate = $this -> candidateService -> getCandidateProfile($id) ;

        $invitationsConnect = Auth::user() -> receivedRequests() 
            ->with('sender')
            ->where('status' , 'pending')
            ->get() ; 

        // dd($invitationsConnect) ;
        
        // var_dump($people) ; 
        // exit ; 

        return view ('candidate.dashboardcandidate' , compact('candidate' , 'invitationsConnect')) ; 
    }


}
