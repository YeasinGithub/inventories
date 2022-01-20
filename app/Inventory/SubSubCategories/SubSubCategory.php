<?php

namespace App\Inventory\SubSubCategories;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Inventory\SubCategories\SubCategory;

class SubSubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'sub_category_id',
        'name',
        'image',
        'status',
        'discount'
    ];
    public function Subcategory(){

        return $this->belongsTo(SubCategory::class, 'sub_category_id', 'id');

    }
}
