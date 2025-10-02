<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\ProductCategory;

class Product extends Model
{
    protected $fillable = [
        'name',
        'code',
        'price',
        'product_category_id'
    ];

    protected $casts = [
        'price'=> 'float'
    ];
    
    public function productCategory(): HasMany{
        return $this->hasMany(ProductCategory::class,'id','product_category_id');
    }
}
