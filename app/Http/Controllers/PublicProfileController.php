<?php

namespace App\Http\Controllers;

use App\Services\CandidateService;
use App\Services\RecruiterService;
use App\Services\VacancieService;
use Illuminate\Http\Request;
use View;

class PublicProfileController extends Controller
{
    
    public function __construct(
        private CandidateService $candidateService , 
        private RecruiterService $recruiterService
    ) {}

    public function showCandidate($id) 
    {
        $user = $this -> candidateService -> getCandidateProfile($id) ;  

        // dd($user) ; 

        return View('candidate.public-cancdidat' , compact('user')) ;
    }


    public function showRecruiter($id)
    {

        $user = $this -> recruiterService -> getRecruteurProfile ($id) ;

        return view('recruiter.public-recruiter' , compact('user')) ;
    }

}
