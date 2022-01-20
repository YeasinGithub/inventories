<?php

namespace App\Inventory\Requisitions\Exceptions;

class RequisitionUpdateErrorException extends \Exception
{
	public function render($request)
    {
        return "Requisition Not Updated";
    }

}
