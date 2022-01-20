<?php

namespace App\SubCategories\Exceptions;

class SubCategoryUpdateErrorException extends \Exception
{
	public function render($request)
    {
        return "SubCategory Not Updated";
    }

}
