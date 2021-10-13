<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'merchant_id',
        'category_id',
        'name',
        'image',
        'price',
        'description'
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s'
    ];

    public function scopeGetInformation($query)
    {
        return $query->leftJoin('merchants m', 'merchant_id', '=', 'm.id')
                        ->leftJoin('categories c', 'category_id', '=', 'c.id')
                        ->leftJoin('product_types pt', 'c.product_type_id', '=', 'pt.id')
                        ->orderBy('product.created_at', 'asc');
    }
}
