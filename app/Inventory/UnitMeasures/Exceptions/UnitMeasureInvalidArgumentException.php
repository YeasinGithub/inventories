<?php

namespace App\Inventory\UnitMeasures\Exceptions;

use Doctrine\Instantiator\Exception\InvalidArgumentException;

class UnitMeasureInvalidArgumentException extends InvalidArgumentException
{
	public function render($request)
    {
        return "UnitMeasures Invalid Argument";
    }
}
