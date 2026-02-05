<?php

namespace App\Http\Controllers;

use App\Http\Requests\VacancyRequest;
use Illuminate\Http\Request;
use App\Services\VacancyService  ;

class vacanciesController extends Controller
{

    public function __construct(
        private VacancyService $vacancyService 
    ) {}

    public function store(VacancyRequest $request) {
    
        $data = $request -> validated() ; 

        $this -> vacancyService -> createNewVacancy($data) ;
        
        


    }

}
