<?php

namespace App\Inventory\RequisitionDetails\Exceptions;

use Doctrine\Instantiator\Exception\InvalidArgumentException;

class RequisitionDetailInvalidArgumentException extends InvalidArgumentException
{
	public function render($request)
    {
        return "RequisitionDetails Invalid Argument";
    }
}
