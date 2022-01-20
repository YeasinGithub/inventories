<?php

namespace App\Inventory\UnitMeasures\Exceptions;

class UnitMeasureNotFoundException extends \Exception
{

public function render($request)
    {
        return "UnitMeasures Not Found";
    }


}
