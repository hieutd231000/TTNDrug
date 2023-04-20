<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supply_histories extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'medicine_id',
        'supplier_id',
        'detail',
        'status'
    ];

    protected $primaryKey = "id";

    /**
     * Relation with medicines model;
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function medicine() {
        return $this->belongsTo(Medicines::class, "medicine_id", "id");
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
