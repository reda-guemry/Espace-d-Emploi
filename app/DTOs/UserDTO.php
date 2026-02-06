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
        public readonly string $email,
        public readonly string $profile_photo , 
        public readonly ?string $bio  ,
        public readonly ?string $cover_photo , 
        public readonly ?string $publicProfileUrl
        )
    {}

    public static function fromModel($user): self 
    {
        return new self (
            id : $user -> id , 
            first_name : $user -> first_name , 
            last_name : $user -> last_name , 
            email : $user -> email , 
            profile_photo : $user -> profile_photo , 
            cover_photo : $user -> cover_photo , 
            bio : $user -> bio , 
            publicProfileUrl : $user -> publicProfilUrl
        ) ;
    }

}
