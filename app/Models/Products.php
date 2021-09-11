<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $primaryKey = 'product_id';

    protected $fillable = [
        'merchant_id',
        'category_id',
        'product_name',
        'product_price',
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s'
    ];

    public function scopeGetInformation($query){
        return $query->leftJoin('merchants as m', 'products.merchant_id', '=', 'm.merchant_id')
                     ->leftJoin('categories as c', 'products.category_id', '=', 'm.category_id')
                     ->leftJoin('productTypes as pt', 'c.product_type_id', '=', 'pt.product_type_id')
                     ->orderBy('products.created_at', 'asc');
    }
}
