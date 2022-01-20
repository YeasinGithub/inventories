<?php

namespace App\ProductStocks\Exceptions;

class ProductStockCreateErrorException extends \Exception
{
	public function render($request)
    {
        return "ProductStock Not Created..!";
    }
}
