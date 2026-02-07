<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CandidateService;
use Illuminate\Support\Facades\Auth;


class CandidateController extends Controller
{

    public function __construct(
        private CandidateService $candidateService
    ) {
    }

    public function index(Request $request)
    {

        $id = Auth::id();

        $filter = $request->all();

        $candidate = $this->candidateService->getCandidateProfile($id);

        $invitationsConnect = Auth::user()->receivedRequests()
            ->with('sender')
            ->where('status', 'pending')
            ->get();

        // dd($invitationsConnect) ;

        // var_dump($people) ; 
        // exit ; 

        return view('candidate.dashboardcandidate', compact('candidate', 'invitationsConnect'));
    }


    public function storeEducation(Request $request)
    {
        $validated = $request->validate([
            'degree' => 'required|string|max:255',
            'school' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'description' => 'nullable|string|max:1000',
        ]);

        $this->candidateService->addEducation(Auth::id(), $validated);

        return redirect()->back();

    }


    public function storeEcperience(Request $request)
    {
        $validated = $request->validate([
            'position' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'description' => 'nullable|string|max:1000',
        ]);
        
        // dd($validated) ; 
        // return ; 


        $this->candidateService->addExperience(Auth::id(), $validated);

        // return ; 

        return redirect()->back();


    }

    public function experienceDestroy($id) 
    {
        $this -> candidateService -> experienceDestroy($id) ; 

        return redirect() -> back() ; 
    }

    public function educationDestroy($id) 
    {
        $this -> candidateService -> educationDestroy($id) ; 

        return redirect() -> back() ;
        
    }


}
