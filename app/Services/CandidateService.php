<?php

namespace App\Services;

use App\Repository\Interfaces\CandidateRepositoryInterface ; 


class CandidateService
{
    /**
     * Create a new class instance.
     */
    public function __construct(protected CandidateRepositoryInterface $repository)
    {
        //
    }


    public function getDashboardCandidates() {
        $candidat = $this -> repository -> getAllCandidates() ;

        

    }

}
