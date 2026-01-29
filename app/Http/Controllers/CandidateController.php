<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CandidateController extends Controller
{

    public function __construct(protected $recruiterService) {

    }

    public function index() {
        return view ('candidate.dashboardcandidate') ; 
    }


}
