<?php

namespace App\Inventory\Products\Exceptions;

class ProductCreateErrorException extends \Exception
{
	public function render($request)
    {
        return "Products Not Created..!

                Somethings errors..!";
    }
}
