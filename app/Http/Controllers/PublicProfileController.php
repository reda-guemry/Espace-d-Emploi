<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;

class PublicProfileController extends Controller
{
    

    public function showCandidate($id) 
    {


        return View('candidate.public-cancdidat' , compact('id')) ;
    }


    public function showRecruiter($id)
    {

        return view('recruiter.public-recruiter' , compact('id')) ;
    }

}
