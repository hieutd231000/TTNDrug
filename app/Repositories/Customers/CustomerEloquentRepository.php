<?php

namespace App\Repositories\Customers;

use App\Models\Customers;
use App\Repositories\Eloquent\EloquentRepository;
use Illuminate\Support\Facades\DB;

class CustomerEloquentRepository extends EloquentRepository implements CustomerRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return Customers::class;
    }

    public function search($valueSearch)
    {
        return DB::table("customers")
            ->where("phone", $valueSearch)
            ->first();
    }
}
