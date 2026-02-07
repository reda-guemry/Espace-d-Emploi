<?php

namespace App\Repositories\Eloquent;

use App\Models\Education;


class EducationRepositorie
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }


    public function store($id, $data)
    {
        return Education::create([
            'user_id' => $id,
            'degree' => $data['degree'],
            'school' => $data['school'],
            'start_date' => $data['start_date'],
            'end_date' => $data['end_date'] ?? null,
            'description' => $data['description'] ?? null,
        ]);
    }

}
