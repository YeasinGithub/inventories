<?php

namespace App\Inventory\ProductStocks;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Inventory\Products\Product;

class ProductStock extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'buy_date',
        'expire_date',
        'price',
        'unit_price',
        'comission_amount',
        'stock_in_date',
        'sku',
        'quantity',
        'warehouse_id',
        'from_sender_warehouse',
        'total_amount',
        'actual_buy_price',
        'buy_price',
        'sell_price',
        'irregular_price'
        
    ];

    public function wirehouse()
    {
        return $this->belongsToMany(Wirehouse::class);
    }
    public function product()
    {
        return $this->belongsTo('App\Inventory\Products\Product');
    }
}
