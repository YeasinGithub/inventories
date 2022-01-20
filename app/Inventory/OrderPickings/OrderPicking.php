<?php

namespace App\Inventory\OrderPickings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderPicking extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'warehouse_id',
        'employee_id',
        'picking_date'
    ];

     public function order()
    {
        return $this->belongsToMany(Order::class);
    }
    public function warehouse()
    {
        return $this->belongsToMany(Warehouse::class);
    }
    public function employee()
    {
        return $this->belongsToMany(Employee::class);
    }
}
