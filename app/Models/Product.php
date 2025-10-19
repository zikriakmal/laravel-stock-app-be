<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    protected $appends = ['quantity'];

    protected $fillable = [
        'name',
        'code',
        'price',
        'product_category_id'
    ];

    protected $casts = [
        'price' => 'float',
    ];

    public function productCategories(): HasMany
    {
        return $this->hasMany(ProductCategory::class, 'id', 'product_category_id');
    }

    public function stockTransaction(): hasMany
    {
        return $this->hasMany(StockTransaction::class, 'product_id', 'id');
    }

    public function getQuantityAttribute(): int
    {
        $in = $this->stockTransaction()
            ->where('transaction_type', 'in')
            ->sum('quantity');

        $out = $this->stockTransaction()
            ->where('transaction_type', 'out')
            ->sum('quantity');

        return (int) ($in - $out);
    }
}
