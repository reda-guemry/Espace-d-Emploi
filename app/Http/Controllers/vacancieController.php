<?php

namespace App\Http\Controllers;

use App\Http\Requests\VacancieRequest;
use Illuminate\Http\Request;
use App\Services\VacancieService;
use Illuminate\Support\Facades\Auth;


class vacancieController extends Controller
{

    public function __construct(
        private VacancieService $vacancyService
    ) {
    }

    public function store(VacancieRequest $request)
    {

        $data = $request->validated();

        $data['user_id'] = auth()->id();

        $this->vacancyService->createNewVacancy($data);

        return redirect()->back()->with('success', 'Vacancy Created');

    }

    public function delete($id) {
        $this -> vacancyService -> deleteVacancie($id) ;

        return redirect() -> back() -> with('succes' , 'Vacancy Deletted') ; 
    }

    public function apply(Request $request) 
    {
        $vacancieId  = $request -> input('vacancy_id') ; 

        $request -> validate([
            'vacancy_id' => 'required | exists:vacancies,id' , 
            'cv' => 'required'
        ]) ; 

        $data = [
            'cv' => $request -> file('cv') , 
            'message' => $request -> input('message') , 
            'user_id' => Auth::id() , 

        ] ;

        $this -> vacancyService -> apply($data) ;


    }



}
