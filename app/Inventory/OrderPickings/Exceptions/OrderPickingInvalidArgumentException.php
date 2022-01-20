<?php

namespace App\Inventory\OrderPicikings\Exceptions;

use Doctrine\Instantiator\Exception\InvalidArgumentException;

class OrderPicikingInvalidArgumentException extends InvalidArgumentException
{
	public function render($request)
    {
        return "OrderPicikings Invalid Argument";
    }
}
