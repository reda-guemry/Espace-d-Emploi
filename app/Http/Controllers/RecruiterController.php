<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\RecruiterService;


class RecruiterController extends Controller
{

    public function __construct(
        private RecruiterService $recruiterService
    ){} 

    public function index(Request $request) {

        $filter = $request -> all() ;

        $candidates = $this -> recruiterService -> getDashboardCandidates($filter) ; 

        return view('recruiter.dashboardrecruiter' , compact('candidates')) ; 
    }
}
