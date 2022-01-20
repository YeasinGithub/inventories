<?php

namespace App\Inventory\ProductStocks\Exceptions;

class ProductStockNotFoundException extends \Exception
{

public function render($request)
    {
        return "ProductStocks Not Found";
    }


}
