<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class info extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'id',
        'user_id',
        'fb',
        'ig',
        'twitter',
    ];

    protected $primaryKey = "id";
}
