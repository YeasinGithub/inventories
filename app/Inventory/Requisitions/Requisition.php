<?php

namespace App\Inventory\Requisitions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requisition extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid',
        'requisition_name',
        'employee_id'
    ];
}
