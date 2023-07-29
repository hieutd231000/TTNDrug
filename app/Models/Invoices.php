<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoices extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'money',
        'method',
        'user_id',
    ];

    protected $primaryKey = "id";
}
