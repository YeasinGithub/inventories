<?php

namespace App\Inventory\UnitMeasures;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitMeasure extends Model
{
     use HasFactory;
     
    protected $fillable = [
        'name'
    ];

    public function product_stock()
    {
        return $this->belongsToMany(ProductStock::class);
    }

}
