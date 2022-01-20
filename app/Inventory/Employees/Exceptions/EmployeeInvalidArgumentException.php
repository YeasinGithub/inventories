<?php

namespace App\Inventory\Employees\Exceptions;

use Doctrine\Instantiator\Exception\InvalidArgumentException;

class EmployeeInvalidArgumentException extends InvalidArgumentException
{
	public function render($request)
    {
        return "Employees Invalid Argument";
    }
}
