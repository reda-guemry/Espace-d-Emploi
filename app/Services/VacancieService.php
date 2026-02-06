<?php

namespace App\Services;

use App\Repositories\Eloquent\VacancieRepository;

class VacancieService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        public VacancieRepository $vacancyRepository
    ) {
    }


    public function createNewVacancy($data)
    {

        if (isset($data['image'])) {
            $path = $data['image']->store('vacancy', 'public');

            $data['image'] = $path;
        }

        return $this->vacancyRepository->store($data);

    }

    public function getVacanciesByLimit($limit)
    {
        return $this->vacancyRepository->getVacanciesByLimit($limit);
    }

    public function getAllVacancie($id)
    {
        return $this->vacancyRepository->getAllVacancie($id);
    }

    public function findVacancie($id)
    {
        return $this -> vacancyRepository -> findVacancieById ($id) ;
    }



}
