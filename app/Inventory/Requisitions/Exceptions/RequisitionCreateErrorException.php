<?php

namespace App\Inventory\Requisitions\Exceptions;

class RequisitionCreateErrorException extends \Exception
{
	public function render($request)
    {
        return "Requisition Not Created...!
        		Somethings Error...!";
    }
}
