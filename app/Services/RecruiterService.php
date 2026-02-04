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


    public function getRecruteurProfile($id) {
        return $this -> repository ->getUserById($id)  ;
    }

}
 