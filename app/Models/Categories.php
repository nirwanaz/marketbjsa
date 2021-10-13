<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'product_type_id',
        'name',
        'description'
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s'
    ];

    public function scopeGetInformation($query){
        return $query->leftJoin(
                        'product_types as pt',
                        'categories.product_type_id',
                        '=',
                        'pt.id')
                     ->orderBy('categories.created_at', 'asc');
    }

    public function scopeFindByPtypeId($query, $id){
        return $query->where('product_type_id', $id);
    }
}
