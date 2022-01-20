<?php

namespace App\Inventory\Employees;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'experience',
        'salary',
        'image',
        'vacation',
        'city'
    ];

    /*public function subcategories()
    {
        return $this->belongsToMany(SubCategory::class);
    }*/

}
