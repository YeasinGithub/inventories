<?php

namespace App\Inventory\OrderDetails;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'unitcost',
        'total'
    ];
    public function Order()
    {
        return $this->belongsToMany(Order::class);
    }
    public function Product()
    {
        return $this->belongsToMany(Product::class);
    }
}
