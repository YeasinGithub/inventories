<?php

namespace App\Inventory\Warehouses;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address'
    ];

    public function product_stock()
    {
        return $this->belongsToMany(ProductStock::class);
    }
}
