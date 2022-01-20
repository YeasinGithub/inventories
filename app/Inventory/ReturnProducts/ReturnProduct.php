<?php

namespace App\Inventory\ReturnProducts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnProduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'return_date',
        'reason_of_return'
    ];
    public function Order()
    {
        return $this->belongsToMany(Order::class);
    }
}
