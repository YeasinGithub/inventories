<?php

namespace App\Inventory\SubSubCategories\Exceptions;

class SubSubCategoryCreateErrorException extends \Exception
{
	public function render($request)
    {
        return "SubSubCategory Not Created...!

            Somethings Errrors...!";
    }
}
