<?php

namespace App\Inventory\ProductStockTransfers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockTransfer extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'product_stock_id',
        'sender_house',
        'receiver_house',
        'quantity'
        
    ];

    public function productstock()
    {
        return $this->belongsToMany(ProductStock::class);
    }
}
