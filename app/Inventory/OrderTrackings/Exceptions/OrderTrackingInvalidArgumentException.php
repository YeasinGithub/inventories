<?php

namespace App\Inventory\OrderTrackings\Exceptions;

use Doctrine\Instantiator\Exception\InvalidArgumentException;

class OrderTrackingInvalidArgumentException extends InvalidArgumentException
{
	public function render($request)
    {
        return "OrderTracking Invalid Argument";
    }
}
