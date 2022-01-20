<?php

namespace App\Inventory\Requisitions\Exceptions;

class RequisitionNotFoundException extends \Exception
{

public function render($request)
    {
        return "Requisition Not Found";
    }


}
