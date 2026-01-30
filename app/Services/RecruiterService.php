<?php

namespace App\Services;

use App\Repositories\Interfaces\UserRepositoryInterface ; 
use App\DTOs\UserDTO ; 


class RecruiterService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected UserRepositoryInterface $repository
    ){}


    public function getDashboardCandidates(array $filter = []) {

        $candidat = $this -> repository -> getAllCandidates($filter) ;

        return $candidat -> map(fn ($user) => UserDTO::fromModel($user)) ; 

    }

}
 