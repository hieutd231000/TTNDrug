<?php
//
//namespace App\Repositories\Units;
//
//use App\Models\Units;
//use App\Repositories\Eloquent\EloquentRepository;
//use Illuminate\Support\Facades\DB;
//
//class UnitEloquentRepository extends EloquentRepository implements UnitRepositoryInterface
//{
//    /**
//     * @return mixed
//     */
//    public function getModel()
//    {
//        return Units::class;
//    }
//
//    /**
//     * @param $categoryId
//     * @return \Illuminate\Support\Collection
//     */
//    public function checkProductByUnitId($unitId) {
//        return DB::table("products")
//            ->where("unit_id", $unitId)
//            ->count();
//    }
//}
