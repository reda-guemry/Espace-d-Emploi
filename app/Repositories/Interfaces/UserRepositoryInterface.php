<?php

namespace App\Repositories\Interfaces;

use Illuminate\Support\Collection;
use App\Models\User ; 

interface UserRepositoryInterface
{
    public function getAllCandidates(array $filter = []): Collection ;

    public function getUserById(int $id): ?User ;

    public function getAllUser() :Collection ; 

}
