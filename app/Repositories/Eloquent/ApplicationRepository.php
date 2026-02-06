<?php

namespace App\Repositories\Eloquent;

use App\Models\Application ; 

class ApplicationRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {}



    public function store($data) {
        return Application::create([
            'vacancie_id' => $data['vacancieId'] , 
            'user_id' => $data['user_id'] , 
            'message' => $data['message'] , 
            'cv_attached' => $data['cv']
        ]) ;
    }

}
