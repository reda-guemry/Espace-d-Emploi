<?php

namespace App\Http\Controllers;

use App\Services\VacancieService;
use Illuminate\Http\Request;
use App\Services\RecruiterService;
use Illuminate\Support\Facades\Auth;


class RecruiterController extends Controller
{

    public function __construct(
        private RecruiterService $recruiterService , 
        private VacancieService $vacancyService
    ){} 

    public function index(Request $request) { 

        $id = Auth::id() ; 

        $recruteur = $this -> recruiterService -> getRecruteurProfile($id); 

        
        // var_dump($candidates) ;
        // exit ; 

        return view('recruiter.dashboardrecruiter' , compact('recruteur')) ; 
    }
}
