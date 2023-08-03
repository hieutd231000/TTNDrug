<?php

namespace App\Repositories\UserNotifications;

use App\Models\UserNotifications;
use App\Repositories\Eloquent\EloquentRepository;
use Illuminate\Support\Facades\DB;

class UserNotificationsEloquentRepository extends EloquentRepository implements UserNotificationsRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return UserNotifications::class;
    }

    /**
     * @param $user_id
     * @param $noti_id
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Query\Builder|object|null
     */
    public function is_read($noti_id, $user_id) {
        return DB::table("user_notifications")
            ->where("user_id", $user_id)
            ->where("notification_id", $noti_id)
            ->first();
    }
}
