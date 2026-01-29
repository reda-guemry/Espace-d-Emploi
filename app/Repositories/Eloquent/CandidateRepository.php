<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Interfaces\CandidateRepositoryInterface ; 
use Illuminate\Support\Collection;
use App\Models\User ;



class CandidateRepository implements CandidateRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getAllCandidates(): Collection {
        return User:where('role' , 'candidate') -> latest -> get() ; 
    }

}
