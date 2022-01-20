<?php

namespace App\Inventory\RequisitionDetails;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequisitionDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'requisition_id',
        'product_id',
        'quantity',
        'date',
        'warehouse_id'
    ];
}
