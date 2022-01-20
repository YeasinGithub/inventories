<?php

namespace App\Inventory\SubCategories\Exceptions;

class SubCategoryCreateErrorException extends \Exception
{
	public function render($request)
    {
        return"SubCategory Not Created...!
        		Somethings Errors....!
        ";
    }
}
