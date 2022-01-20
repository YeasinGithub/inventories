<?php

namespace App\Inventory\Products\Exceptions;

class ProductNotFoundException extends \Exception
{

public function render($request)
    {
        return "This Products Not Found";
    }


}
