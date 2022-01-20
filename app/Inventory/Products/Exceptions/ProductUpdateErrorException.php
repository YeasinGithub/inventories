<?php

namespace App\Products\Exceptions;

class ProductUpdateErrorException extends \Exception
{
	public function render($request)
    {
        return "Product Not Updated..!";
    }
}
