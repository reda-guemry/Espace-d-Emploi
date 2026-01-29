<?php

namespace App\DTOs;

class UserDTO
{
    /**
     * Create a new class instance.
     */ 
    public function __construct(
        public readonly int $id ,
        public readonly string $first_name ,
        public readonly string $last_name ,
        public readonly string $role ,
        public readonly string $email
        )
    {}

    public static function fromModel($user): self 
    {
        return new self (
            id : $user -> id , 
            first_name : $user -> first_name , 
            last_name : $user -> last_name , 
            role : $user -> role , 
            email : $user -> email 
        ) ;
    }

}
