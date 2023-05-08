<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'category_id',
        'product_name',
        'product_image',
        'unit_id',
        'price_unit',
        'product_code',
        'instruction',
        'expire_date'
    ];

    protected $primaryKey = "id";

    /**
     * Relation with categories model;
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category() {
        return $this->belongsTo(Categories::class, "category_id", "id");
    }

    /**
     * Relation with unit model;
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function unit() {
        return $this->belongsTo(Units::class, "unit_id", "id");
    }
}
