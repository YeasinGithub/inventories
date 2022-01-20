<?php

namespace App\Inventory\ProducStocks\Exceptions;

use Doctrine\Instantiator\Exception\InvalidArgumentException;

class ProducStocktInvalidArgumentException extends InvalidArgumentException
{
	public function render($request)
    {
        return "ProducStock Invalid Argument";
    }
}
