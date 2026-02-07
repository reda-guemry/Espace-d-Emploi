<?php

namespace App\Services;

use App\DTOs\UserDTO;
use App\Repositories\Interfaces\UserRepositoryInterface ; 
use App\Repositories\Eloquent\EducationRepositorie ; 
use App\Repositories\Eloquent\ExperienceRepositorie ; 



class CandidateService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        protected UserRepositoryInterface $repository , 
        protected EducationRepositorie $educationRepositorie , 
        protected ExperienceRepositorie $experienceRepositorie , 
    ) {
    }

    public function getCandidateProfile(int $id)
    {
        $candidatUser = $this -> repository ->getUserById($id) ;

        return UserDTO::fromModel($candidatUser) ; 
        
    }

    public function addEducation($id , $data) 
    {
        return $this -> educationRepositorie -> store($id , $data);
    }

    public function addExperience($id , $data) 
    {
        return $this -> experienceRepositorie -> store($id , $data) ;
    }

}
