<?php

namespace App\Inventory\SubCategories;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Inventory\Categories\Category;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'image',
        'status',
        'discount',
        'has_sub_sub_category'
    ];
    
     public function category(){

         return $this->belongsTo(Category::class, 'category_id', 'id');

     }
}
