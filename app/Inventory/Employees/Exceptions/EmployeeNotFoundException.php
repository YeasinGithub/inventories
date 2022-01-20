<?php

namespace App\Inventory\Employees\Exceptions;

class EmployeeNotFoundException extends \Exception
{

public function render($request)
    {
        return "Employee salary Not Found";
    }


}
