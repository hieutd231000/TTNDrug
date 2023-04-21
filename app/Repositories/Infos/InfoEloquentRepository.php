<?php

namespace App\Repositories\Infos;

use App\Models\info;
use App\Repositories\Eloquent\EloquentRepository;
use Illuminate\Support\Facades\DB;

class InfoEloquentRepository extends EloquentRepository implements InfoRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return info::class;
    }

    /**
     * @param $userId
     * @return mixed
     */
    public function getInfoUserId($userId){
        return DB::table("infos")
            ->where("user_id", $userId)
            ->first();
    }
}
