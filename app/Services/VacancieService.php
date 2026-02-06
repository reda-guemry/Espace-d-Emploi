<?php

namespace App\Services;

use App\DTOs\VacancieDTO;
use App\DTOs\VacancieUpdateDTO;
use App\Repositories\Eloquent\VacancieRepository;

class VacancieService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        public VacancieRepository $vacancieRepository
    ) {
    }


    public function createNewVacancy($data)
    {

        if (isset($data['image'])) {
            $path = $data['image']->store('vacancy', 'public');

            $data['image'] = $path;
        }

        return $this->vacancieRepository->store($data);

    }

    public function getVacanciesByLimit($limit)
    {
        return $this->vacancieRepository->getVacanciesByLimit($limit);
    }

    public function getAllVacancie($id)
    {
        return $this->vacancieRepository->getAllVacancie($id);
    }

    public function findVacancie($id)
    {
        return $this->vacancieRepository->findVacancieById($id);
    }

    public function update(int $id, VacancieUpdateDTO $dto)
    {
        // dd ($dto) ;

        return $this->vacancieRepository->update(
            $id,
            [
                'title' => $dto->title,
                'location' => $dto->location,
                'description' => $dto->description,
                'contract_type' => $dto->contract_type,
                'status' => $dto->status,
                'finish_at' => $dto->finish_at,
                'image' => $dto->image,
            ]
        );
    }

    public function deleteVacancie($id)
    {
        return $this -> vacancieRepository -> delete($id) ;  
    }


}
