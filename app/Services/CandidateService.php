<?php

namespace App\Services;

use App\DTOs\UserDTO;
use App\Repositories\Interfaces\CandidateRepositoryInterface ; 

class CandidateService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected CandidateRepositoryInterface $repository
    ) {
    }

    public function getCandidateProfile(int $id)
    {
        $candidatUser = $this -> repository ->getCandidateProfile($id) ;

        return UserDTO::fromModel($candidatUser) ; 
        
    }

}
