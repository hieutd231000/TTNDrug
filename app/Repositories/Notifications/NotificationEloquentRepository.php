<?php

namespace App\Repositories\Notifications;

use App\Models\Notifications;
use App\Repositories\Eloquent\EloquentRepository;

class NotificationEloquentRepository extends EloquentRepository implements NotificationRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return Notifications::class;
    }
}
