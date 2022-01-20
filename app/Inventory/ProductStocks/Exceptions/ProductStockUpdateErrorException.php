<?php

namespace App\Productstocks\Exceptions;

class ProductStockUpdateErrorException extends \Exception
{
	public function render($request)
    {
        return "ProductStocks Not Updated..!";
    }
}
