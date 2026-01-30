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

    public function getAllCandidates(array $filter = []): Collection {

        $query = User::where('role' , 'candidate')  ; 

        $allowedFilter = ['specialty']  ; 

        foreach ($filter as $key => $value ) { 

            if (empty($value)) { 
                continue ; 
            }

            if($key === 'search') {
                $query -> where (function($q) use ($value) {
                        $q -> where ('first_name' , 'like' , '%' . $value . '%') 
                        -> orwhere ('last_name' , 'like' , '%' . $value . '%')
                        -> orWhereRaw("CONCAT(first_name || ' ' || last_name) ILIKE ? " , ['%' . $value . '%']) ; 
                });
                continue ; 
            }

            if (in_array($key , $allowedFilter)) {
                $query -> where($key , $value) ;
            }


        }

        return $query -> latest() -> get() ;  

    }

    public function getCandidateProfile(int $id): ?User {

        return User::where('role' , 'candidate') -> find($id) ;
    }

}
