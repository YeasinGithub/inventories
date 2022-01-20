<?php

namespace App\Inventory\Categories\Exceptions;

class CategoryUpdateErrorException extends \Exception
{
	public function render($request)
    {
        return "Category Not Updated";
    }

}
