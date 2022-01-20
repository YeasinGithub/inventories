<?php

namespace App\Inventory\SubSubCategories\Exceptions;

use Doctrine\Instantiator\Exception\InvalidArgumentException;

class SubSubCategoryInvalidArgumentException extends InvalidArgumentException
{
	public function render($request)
    {
        return "SubSubCategory Invalid Argument";
    }
}