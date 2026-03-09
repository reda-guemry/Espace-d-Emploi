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

        $request -> validate([
            'vacancy_id' => 'required|exists:vacancies,id' , 
            'cv' => 'required|file|mimes:pdf,doc,docx|max:2048'
        ]) ; 

        $data = [
            'cv' => $request -> file('cv') , 
            'message' => $request -> input('message') , 
            'user_id' => Auth::id() , 
            'vacancieId' => $request -> input('vacancy_id') ,
        ] ;

        $this -> vacancyService -> apply($data ) ;

        return redirect() -> back() ;

    }



}
