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

    public function index() {

        $id = Auth::id() ; 

        $candidate = $this -> candidateService -> getCandidateProfile($id) ;

        
        // var_dump($candidate) ; 
        // exit ; 

        return view ('candidate.dashboardcandidate' , compact('candidate')) ; 
    }


}
