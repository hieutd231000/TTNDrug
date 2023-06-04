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
        'content',
        'dosage',
        'route_of_use',
        'product_code',
        'instruction',
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
}
