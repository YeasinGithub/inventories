<?php

namespace App\Inventory\Requisitions\Exceptions;

use Doctrine\Instantiator\Exception\InvalidArgumentException;

class RequisitionInvalidArgumentException extends InvalidArgumentException
{
	public function render($request)
    {
        return "Requisition Invalid Argument";
    }
}
