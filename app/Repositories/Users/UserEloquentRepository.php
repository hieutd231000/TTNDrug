<?php

namespace App\Repositories\Users;

use App\Models\User;
use App\Repositories\Eloquent\EloquentRepository;
use Illuminate\Support\Facades\DB;

class UserEloquentRepository extends EloquentRepository implements UserRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return User::class;
    }

    /**
     * Check admin(0)/users(1) function
     *
     * @param $userId
     * @return bool|void
     */
    public function checkRole($userEmail)
    {
        $user = DB::table("users")
            ->where("email", $userEmail)
            ->first();
        if($user->role) {
            return true;
        }
    }

    /**
     * Split users email function
     *
     * @param $userEmail
     * @return string
     */
    public function splitUserEmail($userEmail)
    {
        return explode("@", $userEmail)[0];
    }

    /**
     * Get email
     *
     * @return \Illuminate\Support\Collection
     */
    public function getEmail()
    {
        return DB::table("users")
            ->pluck("email");
    }
}
