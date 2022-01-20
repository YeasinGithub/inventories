<?php

namespace App\Inventory\SubCategories\Exceptions;

class SubCategoryNotFoundException extends \Exception
{
public function render($request)
    {
        return "SubCategory Not Found!";
    }

}