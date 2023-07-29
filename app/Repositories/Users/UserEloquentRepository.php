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

    /**
     * @return int
     */
    public function countUser()
    {
        return DB::table("users")
            ->get()
            ->where("role", 0)
            ->count();
    }

    /**
     * @return int
     */
    public function countAdmin()
    {
        return DB::table("users")
            ->get()
            ->where("role", 1)
            ->count();
    }

    public function getLatestUser()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date('Y/m/d', time());
        $currentDates = explode("/", $date);
        $users = DB::table("users")
            ->take(8)
            ->orderBy("id", "DESC")
            ->get();
        foreach ($users as $user) {
            if(!is_null($user->created_at)) {
                $createUserTime = explode(" ", $user->created_at);
                $createUserDay = explode("-", $user->created_at);
                $user->countDayCreate =((int)$currentDates[1] - (int)$createUserDay[1]) * 31 + ((int)$currentDates[2] - (int)$createUserDay[2]);
            }
        }
        return $users;
    }

    /**
     * @return array
     */
    public function thkUserByTime()
    {
        $currentYear = date("Y");
        $countUserByTime = [];
        $listUser = DB::table("users")
            ->select("id", "created_at")
            ->where("role", 0)
            ->get();
        for($i = 0; $i < 5; $i++) {
            $countByMonth = array_fill(0, 12, 0);
            foreach ($listUser as $user) {
                if(!is_null($user->created_at)) {
                    $getCreateTimes = explode(" ", $user->created_at);
                    $getCreateTime = explode("-", $getCreateTimes[0]);
                    if($getCreateTime[0] == strval((int)$currentYear - $i)) {
                        $countByMonth[(int)$getCreateTime[1] - 1] += 1;
                    }
                }
            }
            array_push($countUserByTime, ['currentYear' => strval((int)$currentYear - $i), 'countUserByTime' => $countByMonth]);
        }
        return $countUserByTime;
    }
    public function thkAdminByTime()
    {
        $currentYear = date("Y");
        $countUserByTime = [];
        $listUser = DB::table("users")
            ->select("id", "created_at")
            ->where("role", 1)
            ->get();
        for($i = 0; $i < 5; $i++) {
            $countByMonth = array_fill(0, 12, 0);
            foreach ($listUser as $user) {
                if(!is_null($user->created_at)) {
                    $getCreateTimes = explode(" ", $user->created_at);
                    $getCreateTime = explode("-", $getCreateTimes[0]);
                    if($getCreateTime[0] == strval((int)$currentYear - $i)) {
                        $countByMonth[(int)$getCreateTime[1] - 1] += 1;
                    }
                }
            }
            array_push($countUserByTime, ['currentYear' => strval((int)$currentYear - $i), 'countUserByTime' => $countByMonth]);
        }
        return $countUserByTime;
    }
    public function thkSupplierByTime()
    {
        $currentYear = date("Y");
        $countSupplierByTime = [];
        $listSuppliers = DB::table("suppliers")
            ->select("id", "created_at")
            ->get();
        for($i = 0; $i < 5; $i++) {
            $countByMonth = array_fill(0, 12, 0);
            foreach ($listSuppliers as $user) {
                if(!is_null($user->created_at)) {
                    $getCreateTimes = explode(" ", $user->created_at);
                    $getCreateTime = explode("-", $getCreateTimes[0]);
                    if($getCreateTime[0] == strval((int)$currentYear - $i)) {
                        $countByMonth[(int)$getCreateTime[1] - 1] += 1;
                    }
                }
            }
            array_push($countSupplierByTime, ['currentYear' => strval((int)$currentYear - $i), 'countUserByTime' => $countByMonth]);
        }
        return $countSupplierByTime;
    }
}
