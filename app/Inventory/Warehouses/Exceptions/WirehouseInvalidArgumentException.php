<?php

namespace App\Inventory\Wirehouses\Exceptions;

use Doctrine\Instantiator\Exception\InvalidArgumentException;

class WirehouseInvalidArgumentException extends InvalidArgumentException
{
	public function render($request)
    {
        return "Wirehouses Invalid Argument";
    }
}
