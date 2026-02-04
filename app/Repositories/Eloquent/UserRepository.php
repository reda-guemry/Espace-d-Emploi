<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Interfaces\UserRepositoryInterface ; 
use Illuminate\Support\Collection;
use App\Models\User ;
use Illuminate\Database\Eloquent\Builder;


class UserRepository implements UserRepositoryInterface
{
    public function getUserById(int $id): ?User {


        return User::find($id) ;

    }

}
