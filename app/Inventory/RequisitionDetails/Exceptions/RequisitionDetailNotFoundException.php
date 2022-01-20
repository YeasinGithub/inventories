<?php

namespace App\Inventory\RequisitionDetails\Exceptions;

class RequisitionDetailNotFoundException extends \Exception
{

public function render($request)
    {
        return "RequisitionDetails Not Found";
    }


}
