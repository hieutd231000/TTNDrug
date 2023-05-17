<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'product_id',
        'supplier_id',
        'detail',
        'amount',
        'receipt_date',
        'expire_date',
        'total_price'
    ];

    protected $primaryKey = "id";

    /**
     * Relation with products model;
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function products() {
        return $this->belongsTo(Products::class, "product_id", "id");
    }

    /**
     * Relation with supplier model;
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function suppliers() {
        return $this->belongsTo(Suppliers::class, "supplier_id", "id");
    }
}
