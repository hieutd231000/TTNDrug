<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'product_name',
        'amount',
        'price',
        'total_price',
        'invoice_id',
    ];

    protected $primaryKey = "id";

}
