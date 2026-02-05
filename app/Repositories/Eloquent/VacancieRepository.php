<?php

namespace App\Repositories\Eloquent;

use App\Models\Vacancie;

class VacancieRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function store($data)
    {
        return Vacancie::create($data);
    }

    public function getVacanciesByLimit($limit)
    {
        return Vacancie::latest()->limit($limit)->get() ; 
    }

}
