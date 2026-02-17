<?php

namespace App\Services;

use App\Repositories\Interfaces\UserRepositoryInterface;

class UserService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        private UserRepositoryInterface $userRepositoryInterface
    )
    {}

    public function getUserById($id)
    {
        return $this -> userRepositoryInterface ->getUserById($id) ;
    }


}
