<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchants extends Model
{
    use HasFactory;

    protected $primaryKey = 'merchant_id';

    protected $fillable = [
        'account_id',
        'merchant_name',
        'merchant_address',
        'merchant_status',
        'merchant_open',
        'merchant_close'
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s'
    ];

    public function scopeGetInformation($query){
        return $query->leftJoin('accounts as a', 'merchants.account_id', '=', 'a.account_id')
                     ->orderBy('merchants.created_at', 'asc');
    }
}
