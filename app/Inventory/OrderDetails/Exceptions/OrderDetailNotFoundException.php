<?php

namespace App\Inventory\OrderDetails\Exceptions;

class OrderDetailNotFoundException extends \Exception
{
	public function render($request)
    {
        return "Order Not Found...!";
    }
}
