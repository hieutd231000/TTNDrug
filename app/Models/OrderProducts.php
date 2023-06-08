<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProducts extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'order_id',
        'product_id',
        'price_amount',
        'amount',
        'total_price',
    ];
    protected $primaryKey = "id";
}
