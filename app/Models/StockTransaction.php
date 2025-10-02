<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockTransaction extends Model
{
    protected $casts = [
        'quantity'=>'integer'
    ];

    protected $fillable = [
        'user_id',
        'product_id',
        'transaction_type',
        'quantity',
        'reference_no',
        'notes',
        'transaction_date'
    ];
}
