<?php

namespace App\Inventory\SubSubCategories\Exceptions;

class SubSubCategoryNotFoundException extends \Exception
{

public function render($request)
    {
        return "SubSubCategory Not Found";
    }


}