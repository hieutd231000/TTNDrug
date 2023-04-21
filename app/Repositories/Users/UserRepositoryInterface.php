<?php

namespace App\Repositories\Users;

interface UserRepositoryInterface
{
    /**
     * Check user/admin function
     *
     * @param $userId
     * @return mixed
     */
    public function checkRole($userEmail);
}
