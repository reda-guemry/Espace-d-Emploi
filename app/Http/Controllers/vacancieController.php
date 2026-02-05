<?php

namespace App\Http\Controllers;

use App\Http\Requests\VacancieRequest;
use Illuminate\Http\Request;
use App\Services\VacancieService  ;

class vacancieController extends Controller
{

    public function __construct(
        private VacancieService $vacancyService 
    ) {}

    public function store(VacancieRequest $request) {
    
        $data = $request -> validated() ; 

        $data['user_id'] = auth() -> id() ;  

        $this -> vacancyService -> createNewVacancy($data) ;
    
        return redirect()->back()->with('success', 'Vacancy Created');

    }

}
