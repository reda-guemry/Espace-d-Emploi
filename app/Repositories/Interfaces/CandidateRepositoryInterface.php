<?php

namespace App\Repositories\Interfaces;

use Illuminate\Support\Collection;
use App\Models\User ; 

interface CandidateRepositoryInterface
{
    public function getAllCandidates(array $filter = []): Collection ;

    public function getCandidateProfile(int $id): ?User ;

}
