<?php

namespace App\Inventory\RequisitionDetails\Exceptions;

class RequisitionDetailCreateErrorException extends \Exception
{
	public function render($request)
    {
        return "RequisitionDetails Not Created...!
        		Somethings Error...!";
    }
}
