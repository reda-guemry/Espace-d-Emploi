<?php

namespace App\Repositories\Interfaces;

use Illuminate\Support\Collection;

interface CandidateRepositoryInterface
{
    public function getAllCandidates(array $filter = []): Collection ;
}
