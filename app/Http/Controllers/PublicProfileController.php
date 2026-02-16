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

        $connection = $this -> candidateService -> getConnectBeetwenUsers($user->id) ;

        // dd($connection) ; 

        return View('candidate.public-cancdidat' , compact('user' , 'connection')) ;
    }


    public function showRecruiter($id)
    {

        $user = $this -> recruiterService -> getRecruteurProfile ($id) ;

        $vacancies = $this -> vacancieService -> getAllVacancie($id) ;

        $connection = $this -> candidateService -> getConnectBeetwenUsers($user->id) ;

        return view('recruiter.public-recruiter' , compact('user' , 'vacancies' , 'connection')) ;
    }

}
