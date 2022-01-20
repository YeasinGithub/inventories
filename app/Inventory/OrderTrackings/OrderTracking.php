<?php

namespace App\Inventory\OrderTrackings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderTracking extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'order_accept',
        'picking_date',
        'product_deliverd',
        'product_on_hand',
        'order_complete'
    ];

    public function order()
    {
        return $this->belongsToMany(Order::class);
    }
}
