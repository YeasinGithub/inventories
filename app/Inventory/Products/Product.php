<?php

namespace App\Inventory\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Inventory\Categories\Category;
use App\Inventory\SubCategories\SubCategory;
use App\Inventory\SubSubCategories\SubSubCategory;

class Product extends Model
{
     use HasFactory;
     
    protected $fillable = [
        'category_id',
        'sub_category_id',
        'sub_sub_category_id',
        'unit_id',
        'name',
        'image',
        'quantity',
        'description'
    ];

    public function category(){

        return $this->belongsTo(Category::class, 'category_id', 'id');

    }
    public function Subcategory(){

        return $this->belongsTo(SubCategory::class, 'sub_category_id', 'id');

    }
    public function SubSubcategory(){

        return $this->belongsTo(SubSubCategory::class, 'sub_sub_category_id', 'id');

    }

}
