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
        return Vacancie::latest()->limit($limit)->get();
    }

    public function getAllVacancie($id)
    {
        return Vacancie::where('user_id', $id)->get();
    }

    public function findVacancieById($id)
    {
        return Vacancie::find($id);
    }

    public function update($id , $data)
    {
        // dd($data) ;

        return Vacancie::where('id', $id)->update($data);

    }

    public function delete($id)
    {
        return Vacancie::destroy($id) ; 
    }

}
