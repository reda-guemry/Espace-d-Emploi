<?php

namespace App\Http\Controllers;

use App\Services\VacancieService;
use Illuminate\Http\Request;
use App\Services\RecruiterService;
use Illuminate\Support\Facades\Auth;


class RecruiterController extends Controller
{

    public function __construct(
        private RecruiterService $recruiterService,
        private VacancieService $vacancieService
    ) {
    }

    public function index(Request $request)
    {

        $id = Auth::id();

        $recruteur = $this->recruiterService->getRecruteurProfile($id);

        $vacancies = $this->vacancieService->getAllVacancie($id);

        $invitationsConnect = Auth::user()->receivedRequests()
            ->with('sender')
            ->where('status', 'pending')
            ->get();


        // dd($vacancies);
        // var_dump($candidates) ;
        // exit ; 

        return view('recruiter.dashboardrecruiter', compact('recruteur', 'vacancies', 'invitationsConnect'));
    }
}
