<?php

namespace App\Inventory\OrderDetails\Exceptions;

use Doctrine\Instantiator\Exception\InvalidArgumentException;

class OrderDetailInvalidArgumentException extends InvalidArgumentException
{
	public function render($request)
    {
        return "Category Invalid Argument";
    }
}
