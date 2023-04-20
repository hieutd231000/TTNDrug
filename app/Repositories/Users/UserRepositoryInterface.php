<?php

namespace App\Repositories\Users;

interface UserRepositoryInterface
{
    /**
     * Check usersss/admin function
     *
     * @param $userId
     * @return mixed
     */
    public function checkRole($userEmail);
}
