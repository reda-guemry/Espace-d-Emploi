<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Interfaces\UserRepositoryInterface ; 
use Illuminate\Support\Collection;
use App\Models\User ;
use Illuminate\Database\Eloquent\Builder;


class UserRepository implements UserRepositoryInterface
{
    /**
     * Create a new class instance.
     */

    protected array $allowedFilter = ['specialty'] ;


    public function __construct()
    {
        //
    }

    public function getAllCandidates(array $filter = []): Collection {

        $query = User::where('role' , 'candidate')  ; 

        $this -> applyFilters($query , $filter) ; 

        return $query -> latest() -> get() ;  

    }

    public function getAllUser(array $filter = [] ) :Collection {

        $query = User::query() ;

        $this -> applyFilters($query , $filter) ; 

        return $query -> latest() -> get() ; 
    }


    public function getUserById(int $id): ?User {


        return User::find($id) ;

    }

    public function  applyFilters(Builder $query , array $filter = []) {

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

            if (in_array($key , $this -> allowedFilter )) {
                $query -> where($key , $value) ;
            }


        }

    }

}
