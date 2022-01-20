<?php

namespace App\Inventory\Categories;

use App\Inventory\Products\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// use App\Inventory\SubCategories\SubCategory;

class Category extends Model
{
    use HasFactory;


   protected $fillable = [
        'name',
        'image',
        'status',
        'discount',
        'has_sub_category'
    ];

    /*public function subcategories()
    {
        return $this->belongsToMany('App\Inventory\SubCategories\SubCategory');
    }*/



    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

}
