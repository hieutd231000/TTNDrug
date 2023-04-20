<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicines extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'category_id',
        'medicine_name',
        'medicine_image',
        'unit_id',
        'quantity',
        'barcode',
        'price',
        'discount',
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
