<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExportPrices extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'product_id',
        'current_price',
        'price_update_time',
    ];
    protected $primaryKey = "id";
}
