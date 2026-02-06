<?php

namespace App\DTOs;

use App\Models\Vacancie ; 


class VacancieDTO
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        public readonly ?int $id,
        public readonly ?int $user_id,
        public readonly ?string $title,
        public readonly ?string $description,
        public readonly ?string $image,
        public readonly ?string $contract_type,
        public readonly ?string $location,
        public readonly ?string $status,
        public readonly ?string $finish_at,
        public readonly ?string $created_at = null
    ) {}

    public static function fromModel(Vacancie $vacancy): self
    {
        return new self(
            id: $vacancy->id,
            user_id: $vacancy->user_id,
            title: $vacancy->title,
            description: $vacancy->description,
            image: $vacancy->image,
            contract_type: $vacancy->contract_type,
            location: $vacancy->location,
            status: $vacancy->status,
            finish_at: $vacancy->finish_at->format('Y-m-d'), 
            created_at: $vacancy->created_at?->diffForHumans()
        );
    }


}
