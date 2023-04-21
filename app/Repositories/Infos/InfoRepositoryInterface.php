<?php

namespace App\Repositories\Infos;

interface InfoRepositoryInterface
{
    /**
     * Get id info user by userid
     *
     * @param $userId
     * @return mixed
     */
    public function getInfoUserId($userId);
}
