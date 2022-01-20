<?php

namespace App\Inventory\SubCategories\Exceptions;

use Doctrine\Instantiator\Exception\InvalidArgumentException;

class SubCategoryInvalidArgumentException extends InvalidArgumentException
{

	public function render($request)
    {
        return "SubCategory Invalid Argument!";
    }
}
