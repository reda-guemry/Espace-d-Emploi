<?php

namespace App\Repositories\Eloquent;

use App\Models\Experience;



class ExperienceRepositorie
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
        // dd($data) ; 

        return Experience::create([
            'user_id' => $id,
            'position' => $data['position'],
            'company_name' => $data['company_name'],
            'start_date' => $data['start_date'],
            'end_date' => $data['end_date'] ?? null,
            'description' => $data['description'] ?? null,
        ]);
    }

    public function destroy($id) 
    {
        return Experience::destroy($id) ; 
    }

    


}
