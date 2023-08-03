<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserNotifications extends Model
{
    use HasFactory;
    /**
     * @var string[]
     */
    protected $fillable = [
        'id',
        'user_id',
        'notification_id'
    ];

    protected $primaryKey = "id";
}
