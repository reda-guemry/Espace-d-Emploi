<?php

namespace App\Services;

use App\Repositories\Eloquent\VacancyRepository;
use 

class VacancyService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        public VacancyRepository $vacancyRepository
    )
    {}


    public function createNewVacancy($data) {

        if (in_array('image' , $data)) {

        }

    }



}
