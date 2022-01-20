<?php

namespace App\Inventory\RequisitionDetails\Exceptions;

class RequisitionDetailUpdateErrorException extends \Exception
{
	public function render($request)
    {
        return "RequisitionDetails Not Updated";
    }

}
