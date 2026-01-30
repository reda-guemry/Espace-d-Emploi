<?php

namespace App\Services;

use App\DTOs\UserDTO;
use App\Repositories\Interfaces\UserRepositoryInterface ; 

class CandidateService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected UserRepositoryInterface $repository
    ) {
    }

    public function getCandidateProfile(int $id)
    {
        $candidatUser = $this -> repository ->getUserById($id) ;

        return UserDTO::fromModel($candidatUser) ; 
        
    }

    public function getallpeople(array $filter = []) {
        $user = $this -> repository ->  getAllUser($filter) ; 

        return $user -> map( fn($usr) => UserDTO::fromModel($usr)  ) ; 

    }

}
