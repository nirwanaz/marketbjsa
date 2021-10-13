<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchants extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'account_id',
        'name',
        'address',
        'picture',
        'ischangename',
        'status',
        'opened',
        'closed'
    ];

    protected $casts = [
        'opened' => 'datetime:H:i',
        'closed' => 'datetime:H:i',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s'
    ];

    public function scopeGetInformation($query){
        return $query->leftJoin('accounts as a', 'merchants.account_id', '=', 'a.id')
                     ->orderBy('merchants.created_at', 'asc');
    }

    public function scopeFindByAccountId($query, $id){
        return $query->where('account_id', $id);
    }
}
