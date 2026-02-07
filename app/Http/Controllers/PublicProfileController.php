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
        private RecruiterService $recruiterService , 
        private VacancieService $vacancieService , 
    ) {}

    public function showCandidate($id) 
    {
        $user = $this -> candidateService -> getCandidateProfileDetails($id) ;  

        // dd($user) ; 

        return View('candidate.public-cancdidat' , compact('user')) ;
    }


    public function showRecruiter($id)
    {

        $user = $this -> recruiterService -> getRecruteurProfile ($id) ;

        $vacancies = $this -> vacancieService -> getAllVacancie($id) ;

        return view('recruiter.public-recruiter' , compact('user' , 'vacancies')) ;
    }

}
