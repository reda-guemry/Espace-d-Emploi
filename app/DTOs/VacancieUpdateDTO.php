<?php

namespace App\DTOs;

class VacancieUpdateDTO
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        public string $title,
        public string $description,
        public ?string $image,
        public string $contract_type,
        public string $location,
        public string $status,
        public string $finish_at,
    ) {}
    
}
