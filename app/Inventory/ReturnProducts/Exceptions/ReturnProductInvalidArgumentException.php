<?php

namespace App\Inventory\ReturnProducts\Exceptions;

use Doctrine\Instantiator\Exception\InvalidArgumentException;

class ReturnProductInvalidArgumentException extends InvalidArgumentException
{
	public function render($request)
    {
        return "ReturnProduct Invalid Argument";
    }
}
