<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StockTransaction extends Model
{
    protected $casts = [
        'quantity' => 'integer'
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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
